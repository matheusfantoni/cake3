<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Anunciants Controller
 *
 * @property \App\Model\Table\AnunciantsTable $Anunciants
 *
 * @method \App\Model\Entity\Anunciant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnunciantsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $anunciants = $this->paginate($this->Anunciants);

        $this->set(compact('anunciants'));
    }

    /**
     * View method
     *
     * @param string|null $id Anunciant id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $anunciant = $this->Anunciants->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('anunciant', $anunciant);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $anunciant = $this->Anunciants->newEntity();
        if ($this->request->is('post')) {
            $anunciant = $this->Anunciants->patchEntity($anunciant, $this->request->getData());
            if ($this->Anunciants->save($anunciant)) {
                $this->Flash->success(__('The anunciant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The anunciant could not be saved. Please, try again.'));
        }
        $users = $this->Anunciants->Users->find('list', ['limit' => 200]);
        $this->set(compact('anunciant', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Anunciant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $anunciant = $this->Anunciants->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $anunciant = $this->Anunciants->patchEntity($anunciant, $this->request->getData());
            if ($this->Anunciants->save($anunciant)) {
                $this->Flash->success(__('The anunciant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The anunciant could not be saved. Please, try again.'));
        }
        $users = $this->Anunciants->Users->find('list', ['limit' => 200]);
        $this->set(compact('anunciant', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Anunciant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $anunciant = $this->Anunciants->get($id);
        if ($this->Anunciants->delete($anunciant)) {
            $this->Flash->success(__('The anunciant has been deleted.'));
        } else {
            $this->Flash->error(__('The anunciant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
