<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Situations Controller
 *
 * @property \App\Model\Table\SituationsTable $Situations
 *
 * @method \App\Model\Entity\Situation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SituationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Colors'],
        ];
        $situations = $this->paginate($this->Situations);

        $this->set(compact('situations'));
    }

    /**
     * View method
     *
     * @param string|null $id Situation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $situation = $this->Situations->get($id, [
            'contain' => ['Colors', 'Carousels'],
        ]);

        $this->set('situation', $situation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $situation = $this->Situations->newEntity();
        if ($this->request->is('post')) {
            $situation = $this->Situations->patchEntity($situation, $this->request->getData());
            if ($this->Situations->save($situation)) {
                $this->Flash->success(__('The situation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The situation could not be saved. Please, try again.'));
        }
        $colors = $this->Situations->Colors->find('list', ['limit' => 200]);
        $this->set(compact('situation', 'colors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Situation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $situation = $this->Situations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $situation = $this->Situations->patchEntity($situation, $this->request->getData());
            if ($this->Situations->save($situation)) {
                $this->Flash->success(__('The situation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The situation could not be saved. Please, try again.'));
        }
        $colors = $this->Situations->Colors->find('list', ['limit' => 200]);
        $this->set(compact('situation', 'colors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Situation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $situation = $this->Situations->get($id);
        if ($this->Situations->delete($situation)) {
            $this->Flash->success(__('The situation has been deleted.'));
        } else {
            $this->Flash->error(__('The situation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
