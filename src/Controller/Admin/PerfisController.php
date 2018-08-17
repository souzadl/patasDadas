<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Perfis Controller
 *
 * @property \App\Model\Table\PerfisTable $Perfis
 *
 * @method \App\Model\Entity\Perfl[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PerfisController extends AppController
{
    
    private function renderForm($perfil, $view = 'form', $layout = null) 
    {
        $this->set('perfil', $perfil);
        $this->set('action', $this->request->getParam('action'));
        parent::render($view, $layout);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $perfis = $this->paginate($this->Perfis);

        $this->set(compact('perfis'));
    }

    /**
     * View method
     *
     * @param string|null $id Perfl id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $perfil = $this->Perfis->get($id, [
            'contain' => []
        ]);

        $this->renderForm($perfil);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $perfil = $this->Perfis->newEntity();
        if ($this->request->is('post')) {
            $perfil = $this->Perfis->patchEntity($perfil, $this->request->getData());
            if ($this->Perfis->save($perfil)) {
                $this->Flash->success(__('The perfl has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The perfl could not be saved. Please, try again.'));
        }
        $this->renderForm($perfil);
    }

    /**
     * Edit method
     *
     * @param string|null $id Perfl id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $perfil = $this->Perfis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $perfil = $this->Perfis->patchEntity($perfil, $this->request->getData());
            if ($this->Perfis->save($perfil)) {
                $this->Flash->success(__('The perfl has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The perfl could not be saved. Please, try again.'));
        }
        $this->renderForm($perfil);
    }

    /**
     * Delete method
     *
     * @param string|null $id Perfl id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $perfl = $this->Perfis->get($id);
        if ($this->Perfis->delete($perfl)) {
            $this->Flash->success(__('The perfl has been deleted.'));
        } else {
            $this->Flash->error(__('The perfl could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function permissoes($id = null)
    {
        $perfil = $this->Perfis->get($id, [
            'contain' => ['AcoesControles']
        ]);        
        $controles = $this->Perfis->AcoesControles->Controles->find('all',[
            'contain'=>['Acoes']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {                      
            $dados['acoes_controles']['_ids'] = array();
            foreach($controles as $controle){
                $dados['acoes_controles']['_ids'] = array_merge(
                        $dados['acoes_controles']['_ids'],
                        $this->request->getData($controle->nome)
                );
            }
            $perfil = $this->Perfis->patchEntity($perfil, $dados,[
                'associated' => ['AcoesControles']
            ]);            

            if ($this->Perfis->save($perfil)) {
                $this->Flash->success(__('{0} saved.', 'Permissões'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('{0} not saved.', 'Permissões'));            
        }
        $this->set(compact('perfil', 'controles'));
    }
}
