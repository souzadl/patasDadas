<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Filesystem\File;

/**
 * Adotaveis Controller
 *
 * @property \App\Model\Table\AdotaveisTable $Adotaveis
 *
 * @method \App\Model\Entity\Adotavei[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdotaveisController extends AppController{
    
    private $padrinhosDisponiveis;
    private $tiposAdotaveis;
    private $tiposPadrinhos;
    private $adotavel;
    
    public function initialize() {
        parent::initialize();
        $this->loadComponent('Upload');
        $this->loadModel('TiposPadrinhos');
        $this->loadModel('Padrinhos');
        $this->loadModel('Fotos');
        $this->loadModel('Pessoas');
        $this->padrinhosDisponiveis = $this->Pessoas->find('list')
            ->where(['roles_id =' => Configure::read('App.idRolePadrinho'), 'active =' => 1]);        
        $this->tiposAdotaveis = $this->Adotaveis->TiposAdotaveis->find('list')->where(['active =' => 1]);
        $this->tiposPadrinhos = $this->TiposPadrinhos->find('all')->where(['active =' => 1]);
        $this->adotavel = '';
    }
    
    private function renderForm($view = 'form', $layout = null) {
        $this->set('adotavel', $this->adotavel);
        $this->set('padrinhosDisponiveis', $this->padrinhosDisponiveis);
        $this->set('tiposAdotaveis', $this->tiposAdotaveis);
        $this->set('tiposPadrinhos', $this->tiposPadrinhos);
        $this->set('action', $this->request->getParam('action'));
        parent::render($view, $layout);
    }
    
    private function addPadrinho($novoPadrinho){
        $add = true;
        foreach($this->adotavel->padrinhos as $padrinho){
            if($padrinho->tipos_padrinhos_id === $novoPadrinho->tipos_padrinhos_id){
                $padrinho->pessoas_id = $novoPadrinho->pessoas_id;
                $add = false;
            }
        }
        return $add; 
    }
    
    private function setPadrinhos(){
        $padrinhos = $this->adotavel->padrinhos;
        foreach ($this->tiposPadrinhos as $tipoPadrinho){
            $idPessoa = $this->request->getData(str_replace(' ','_',$tipoPadrinho->nome));
            if($idPessoa){
                $novoPadrinho = $this->Adotaveis->Padrinhos->newEntity();
                $novoPadrinho->tipos_padrinhos_id = $tipoPadrinho->id;
                $novoPadrinho->users_id = $this->Auth->user('id');   
                $novoPadrinho->pessoas_id = $idPessoa;
                $novoPadrinho->active = true;
                if($this->addPadrinho($novoPadrinho)){
                    $padrinhos[] = $novoPadrinho;
                }
            }
        }
        $this->adotavel->padrinhos = $padrinhos;        
    }
    
    private function setFotosNovas(){
        $fotos = array();
        foreach ($this->Upload->fileNames as $fileName){
            $foto = $this->Adotaveis->Fotos->newEntity();
            $foto->nome = $fileName;
            $foto->users_id = $this->Auth->user()['id']; 
            $foto->active = true;
            $fotos[] = $foto;
        }
        $this->adotavel->fotos = $fotos;
    }
    
    private function addFotosSelecionadas($fotos){
        if ($this->Upload->upload($fotos, Configure::read('App.fotosUrl'))){
            $this->setFotosNovas();
        }        
    }
    
    private function delFotosArmazenadas($fotos){
        $this->Adotaveis->Fotos->deleteAll(['id IN'=>$fotos]);
    }
    
    private function setHistoricoMedico(){
        if($this->request->getData('novo_historico')){
            $this->adotavel->historico_medico = $this->adotavel->historico_medico . PHP_EOL . PHP_EOL .
                date('d/m/Y H:i:s') . ' - ' . $this->Auth->user()['name'] . PHP_EOL .
                $this->request->getData('novo_historico');
        }   
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index(){   
        $nome = $this->getParam("nome");
        if($nome <> ''){
            $this->paginate['conditions']['Adotaveis.nome like '] = $nome;
            $filtro['nome'] = $nome;
        }
        $this->paginate['order'] = ['Adotaveis.nome'];         
        $this->paginate['contain'] = ['TiposAdotaveis'];          
        $adotaveis = $this->paginate($this->Adotaveis);        

        $this->set(compact('adotaveis','filtro'));        
    }
    
    private function getParam($param){
        if(array_key_exists($param, $this->request->getData())){
            $valor = $this->getParamPost($param);
        }else{
            $valor = $this->getParamGet($param);
        }
        return trim($valor);
    }
    
    private function getParamPost($param){
        return trim($this->request->getData('nome'));
    }
    
    private function getParamGet($param){
        $parametros = $this->request->getAttribute('params');
        $paramPassados = $parametros['?'] ?? array();
        $valor =  $paramPassados[$param]?? '';
        return trim($valor);
    }
    
    /**
     * View method
     *
     * @param string|null $id Adotavei id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null){
        $this->adotavel = $this->Adotaveis->get($id, [
            'contain' => ['Padrinhos','Fotos']
        ]);
        $this->renderForm();
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $this->adotavel = $this->Adotaveis->newEntity(); 
        $this->adotavel->padrinhos = array();
        $this->adotavel->fotos = array();
        if ($this->request->is('post')) {
            $this->adotavel = $this->Adotaveis->patchEntity($this->adotavel, $this->request->getData());
            $this->adotavel->users_id = $this->Auth->user()['id'];
            $this->setHistoricoMedico();
            $this->setPadrinhos();
            $this->addFotosSelecionadas($this->request->getData('fotosSelecionadas'));
            if ($this->Adotaveis->save($this->adotavel)) {                             
                $this->Flash->success(__('Adotável salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Adotável não pode ser salvo. Por favor, tente novamente.'));
        }    
        $this->renderForm();
    }

    /**
     * Edit method
     *
     * @param string|null $id Adotavei id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
        $this->adotavel = $this->Adotaveis->get($id, [
            'contain' => ['Padrinhos','Fotos','Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->adotavel = $this->Adotaveis->patchEntity($this->adotavel, $this->request->getData());
            $this->adotavel->users_id = $this->Auth->user('id');            
            $this->setHistoricoMedico();
            $this->setPadrinhos(); 
            $this->addFotosSelecionadas($this->request->getData('fotosSelecionadas'));
            $this->Adotaveis->getConnection()->begin();
            try{
                $this->delFotosArmazenadas($this->request->getData('fotosArmazenadas'));
                if ($this->Adotaveis->save($this->adotavel)) {
                    $this->Adotaveis->getConnection()->commit();
                    $this->Flash->success(__('Adotável salvo.'));
                    return $this->redirect(['action' => 'index']);
                }   
            } catch(\Cake\ORM\Exception\PersistenceFailedException $e) {
                $this->Adotaveis->getConnection()->rollback();
                $this->Flash->error(__('Adotável não pode ser valvo. Por favor, tente novamente.'));
            }                                  
        }
        $this->renderForm();
    }

    /**
     * Delete method
     *
     * @param string|null $id Adotavei id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adotavei = $this->Adotaveis->get($id);
        if ($this->Adotaveis->delete($adotavei)) {
            $this->Flash->success(__('The adotavei has been deleted.'));
        } else {
            $this->Flash->error(__('The adotavei could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
