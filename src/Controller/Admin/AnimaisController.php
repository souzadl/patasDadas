<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Animais Controller
 *
 * @property \App\Model\Table\AnimaisTable $Animais
 *
 * @method \App\Model\Entity\Animai[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnimaisController extends AppController {
    private $padrinhos;
    
    public function initialize() {
        parent::initialize();
        $this->loadModel('Padrinhos');
        $this->loadModel('Prontuarios');                
        $this->padrinhos = $this->Padrinhos->find('list')->order('nome');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate['order'] = ['Animais.nome'];
        $animais = $this->paginate($this->Animais);        
        $this->set(compact('animais'));
    }
    
    private function renderForm($animal, $view = 'form', $layout = null) {
        $prontuario = $this->Prontuarios->find('byAnimal', [
            'id_animal' => $animal->id_animal,
            'contain' => ['HistoricosPeso' => ['sort'=>['HistoricosPeso.data_afericao']], 
                'DoencasCronicas', 
                'AlimentacoesEspeciais', 
                'DeficienciasFisicas', 
                'Medicacoes']
        ]); 
        
        $this->set('animai', $animal);
        $this->set('padrinhos', $this->padrinhos);        
        $this->set('prontuario', $prontuario);  
        $this->set('action', $this->request->getParam('action'));
        parent::render($view, $layout);
    }

    /**
     * View method
     *
     * @param string|null $id Animai id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $animai = $this->Animais->get($id, [
            'contain' => []
        ]);

        $this->renderForm($animai);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $animai = $this->Animais->newEntity();
        if ($this->request->is('post')) {
            $animai = $this->Animais->patchEntity($animai, $this->request->getData());
            if ($this->Animais->save($animai)) {
                $this->Flash->success(__('The animai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The animai could not be saved. Please, try again.'));
        }
        $this->renderForm($animai);
    }
    
    private function addProntuario($idAnimal){
        $this->autoRender = false;
        $prontuario = $this->Prontuarios->newEntity();
        $prontuario->id_animal = $idAnimal;
        if($this->Prontuarios->save($prontuario)){
            return $prontuario;
        }
    }

    private function getProntuarioParaAnimal($idAnimal){
        $prontuario = $this->Prontuarios->find('byAnimal', [
                'id_animal' => $idAnimal
            ]);
        if(!$prontuario){
            $prontuario = $this->addProntuario($idAnimal);
        }
        return $prontuario;
    }
    
    public function addHistoricoPeso(){
        $this->addGenerico('HistoricosPeso', 'Histórico Peso');
    }
    
    public function addDoencaCronica(){
        $this->addGenerico('DoencasCronicas', 'Doença crônica');
    }
    
    public function addAlimentacaoEspecial(){
        $this->addGenerico('AlimentacoesEspeciais', 'Alimentação especial');
    }
    
    public function addDeficienciaFisica(){
        $this->addGenerico('DeficienciasFisicas', 'Deficiência física');
    }
    
    public function addMedicacao(){
        $this->addGenerico('Medicacoes', 'Medicação');
    }
    
    private function addGenerico($model, $label){
        $this->autoRender = false;
        $idAnimal = $this->request->getData('id_animal');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prontuario = $this->getProntuarioParaAnimal($idAnimal); 
            
            $this->loadModel($model);
            $entidade = $this->$model->patchEntity($this->$model->newEntity(), 
                $this->request->getData());
            $entidade->prontuario_id = $prontuario->id;
                 
            $retorno = array();
            if($this->$model->save($entidade)){
                $this->Flash->success(__($label.' salva.'));
                $retorno['status'] = 'success';
                $retorno['redirect'] = $this->redirect(['action' => 'edit', $idAnimal]);
                echo json_encode($retorno);
                //return $this->redirect(['action' => 'edit', $idAnimal]); 
            }else{
                
                $retorno['status'] = 'error';
                $retorno['errors'] = $entidade->getErrors();
                echo json_encode($retorno);
                /*foreach ($entidade->getErrors() as $erros){
                    foreach($erros as $idError=>$descErro){
                        $this->Flash->error(__($descErro));
                    }
                } */
            }
        }                
    }

    /**
     * Edit method
     *
     * @param string|null $id Animai id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $animai = $this->Animais->get($id);                                        
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $animai = $this->Animais->patchEntity($animai, $this->request->getData());
            if ($this->Animais->save($animai)) {
                $this->Flash->success(__('The animai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The animai could not be saved. Please, try again.'));
        }
        $this->renderForm($animai);
    }

    /**
     * Delete method
     *
     * @param string|null $id Animai id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    private function delete($id, $model, $label) {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel($model);
        $entidade = $this->$model->get($id);
        if ($this->$model->delete($entidade)) {
            $this->Flash->success(__($label.' deletado.'));
        } else {            
            foreach ($entidade->getErrors() as $erros){
                foreach($erros as $idError=>$descErro){
                    $this->Flash->error(__($descErro));
                }
            }       
            
        }

        //return $this->redirect(['action' => 'index']);
    }
    
    public function deleteHistoricoPeso($id = null, $id_animal = null){
        $this->delete($id, 'HistoricosPeso', 'Histórico peso');
        return $this->redirect(['action' => 'edit', $id_animal]);
    }
    
    public function deleteDoencaCronica($id = null, $id_animal = null){
        $this->delete($id, 'DoencasCronicas', 'Doença crônica');
        return $this->redirect(['action' => 'edit', $id_animal]);
    }
    
    public function deleteAlimentacaoEspecial($id = null, $id_animal = null){
        $this->delete($id, 'AlimentacoesEspeciais', 'Alimentação especial');
        return $this->redirect(['action' => 'edit', $id_animal]);
    }
    
    public function deleteDeficienciaFisica($id = null, $id_animal = null){
        $this->delete($id, 'DeficienciasFisicas', 'Deficiência física');
        return $this->redirect(['action' => 'edit', $id_animal]);
    }
    
    public function deleteMedicacao($id = null, $id_animal = null){
        $this->delete($id, 'Medicacoes', 'Medicacao');
        return $this->redirect(['action' => 'edit', $id_animal]);
    }

}
