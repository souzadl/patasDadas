<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\Time;

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
        if(is_array($this->request->getParam('pass')) and isset($this->request->getParam('pass')[0])){
            $this->paginate['finder'] = ['ByCondicao' => ['condicao' => $this->request->getParam('pass')[0]]];
        }
        $animais = $this->paginate($this->Animais);        
        $this->set(compact('animais'));
    }
    
    private function renderForm($animal, $view = 'form', $layout = null) {
        $prontuario = $this->Prontuarios->find('byAnimal', [
            'id_animal' => $animal->id_animal,
            'contain' => [
                'HistoricosPeso' => [
                    'sort' => ['HistoricosPeso.data_afericao']
                ], 
                'DoencasCronicas', 
                'AlimentacoesEspeciais', 
                'DeficienciasFisicas', 
                'Medicacoes',
                'Serestos',
                'Vermifugos',
                'Vacinas',
                'Mudancas' => ['Detalhes']
            ]
        ]); 
        
        $prontuario->proximoSeresto = $this->Prontuarios->proximoSeresto($prontuario->serestos);
        $prontuario->proximaVacina = $this->Prontuarios->proximaVacina($prontuario->vacinas, $animal->filhote);
        $prontuario->proximoVermifugo = $this->Prontuarios->proximoVermifugo($prontuario->vermifugos);
        
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
        $this->addGenericoNivel1('HistoricosPeso', 'Histórico Peso');
    }
    
    public function addDoencaCronica(){
        $this->addGenericoNivel1('DoencasCronicas', 'Doença crônica');
    }
    
    public function addAlimentacaoEspecial(){
        $this->addGenericoNivel1('AlimentacoesEspeciais', 'Alimentação especial');
    }
    
    public function addDeficienciaFisica(){
        $this->addGenericoNivel1('DeficienciasFisicas', 'Deficiência física');
    }
    
    public function addMedicacao(){
        $this->addGenericoNivel1('Medicacoes', 'Medicação');
    }
    
    public function addSeresto(){
        $this->addGenericoNivel1('Serestos', 'Seresto');
    }
    
    public function addVermifugo(){
        $this->addGenericoNivel1('Vermifugos', 'Vermífugo');
    }
    
    public function addVacina(){
        $this->addGenericoNivel1('Vacinas', 'Vacína');
    }
    
    public function addAlteracao(){
        $this->loadModel("Mudancas");
        $mudanca = $this->Mudancas->patchEntity($this->Mudancas->newEntity(), $this->request->getData());
        $mudanca->detalhes = array();
        $mudanca->detalhes[] = $this->Mudancas->Detalhes->patchEntity($this->Mudancas->Detalhes->newEntity(), $this->request->getData());
        $this->addGenericoNivel2($this->Mudancas, $mudanca, 'Alteração de Saúde');
    }
    
    private function addGenericoNivel1($model, $label){
        $this->loadModel($model);
        $entidade = $this->$model->patchEntity($this->$model->newEntity(), 
            $this->request->getData());
        $this->addGenericoNivel2($this->$model, $entidade, $label);
    }
    
    private function addGenericoNivel2($model, $entidade, $label){
        $this->autoRender = false;
        $idAnimal = $this->request->getData('id_animal');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prontuario = $this->getProntuarioParaAnimal($idAnimal); 
            $entidade->prontuario_id = $prontuario->id;                 
            $retorno = array();
            if($model->save($entidade)){
                $this->Flash->success(__($label.' salva.'));
                $retorno['status'] = 'success';
                echo json_encode($retorno); 
            }else{                
                $retorno['status'] = 'error';
                $retorno['errors'] = $entidade->getErrors();
                echo json_encode($retorno);
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
        $this->delete($id, 'Medicacoes', 'Medicação');
        return $this->redirect(['action' => 'edit', $id_animal]);
    }
    
    public function deleteVacina($id = null, $id_animal = null){
        $this->delete($id, 'Vacinas', 'Vacina');
        return $this->redirect(['action' => 'edit', $id_animal]);        
    }
    
    public function deleteSeresto($id = null, $id_animal = null){
        $this->delete($id, 'Serestos', 'Seresto');
        return $this->redirect(['action' => 'edit', $id_animal]);        
    }
    
    public function deleteVermifugo($id = null, $id_animal = null){
        $this->delete($id, 'Vermifugos', 'Vermífugo');
        return $this->redirect(['action' => 'edit', $id_animal]);          
    }
    
    public function deleteAlteracao($id = null, $id_animal = null){
        $this->delete($id, 'Mudancas', 'Alterações de Saúde');
        return $this->redirect(['action' => 'edit', $id_animal]);           
    }

}
