<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Robots Controller
 *
 * @property \App\Model\Table\RobotsTable $Robots
 *
 * @method \App\Model\Entity\Robot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RobotsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'order' => ['Robots.id' => 'ASC']
        ];

        $robots = $this->paginate($this->Robots);

        $this->set(compact('robots'));
    }

    /**
     * View method
     *
     * @param string|null $id Robot id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $robot = $this->Robots->get($id, [
            'contain' => ['Anuncios'],
        ]);

        $this->set('robot', $robot);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $robot = $this->Robots->newEntity();
        if ($this->request->is('post')) {
            $robot = $this->Robots->patchEntity($robot, $this->request->getData());
            if ($this->Robots->save($robot)) {
                $this->Flash->success(__('Situação nos buscadores cadastrado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro: Situação nos buscadores não foi cadastrado com sucesso.'));
        }
        $this->set(compact('robot'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Robot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $robot = $this->Robots->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $robot = $this->Robots->patchEntity($robot, $this->request->getData());
            if ($this->Robots->save($robot)) {
                $this->Flash->success(__('Situação nos buscadores editado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro: Situação nos buscadores não foi editado com sucesso.'));
        }
        $this->set(compact('robot'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Robot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $robot = $this->Robots->get($id);
        if ($this->Robots->delete($robot)) {
            $this->Flash->success(__('Situação nos buscadores apagado com sucesso.'));
        } else {
            $this->Flash->error(__('Erro: Situação nos buscadores não foi apagado com sucesso.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
