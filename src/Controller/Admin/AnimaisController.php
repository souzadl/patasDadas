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
        $this->loadModel('HistoricosPesos');
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
            'animal' => $animal,
            'contain' => ['HistoricosPeso', 'DoencasCronicas', 'AlimentacoesEspeciais', 'DeficienciasFisicas', 'Medicacoes']
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
    
    public function addHistoricoPeso(){
        $this->autoRender = false;
        $idAnimal = $this->request->getData('id_animal');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $historico = $this->HistoricosPesos->newEntity();
            $historico = $this->HistoricosPesos->patchEntity($historico, $this->request->getData());
            if($this->HistoricosPesos->save($historico)){
                $this->Flash->success(__('Histórico de peso salvo.'));
            }else{
                $this->Flash->error(__('Histórico de peso não salvo.'));
            }
        }
        return $this->redirect(['action' => 'edit', $idAnimal]);
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
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $animai = $this->Animais->get($id);
        if ($this->Animais->delete($animai)) {
            $this->Flash->success(__('The animai has been deleted.'));
        } else {
            $this->Flash->error(__('The animai could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
