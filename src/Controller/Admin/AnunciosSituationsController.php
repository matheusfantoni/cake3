<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * AnunciosSituations Controller
 *
 * @property \App\Model\Table\AnunciosSituationsTable $AnunciosSituations
 *
 * @method \App\Model\Entity\AnunciosSituation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnunciosSituationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Colors'],
            'order' => ['AnunciosSituations.id' => 'ASC']
        ];
        $anunciosSituations = $this->paginate($this->AnunciosSituations);

        $this->set(compact('anunciosSituations'));
    }

    /**
     * View method
     *
     * @param string|null $id Anuncios Situation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $anunciosSituation = $this->AnunciosSituations->get($id, [
            'contain' => ['Colors', 'Anuncios']
        ]);

        $this->set('anunciosSituation', $anunciosSituation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $anunciosSituation = $this->AnunciosSituations->newEntity();
        if ($this->request->is('post')) {
            $anunciosSituation = $this->AnunciosSituations->patchEntity($anunciosSituation, $this->request->getData());
            if ($this->AnunciosSituations->save($anunciosSituation)) {
                $this->Flash->success(__('Situação de anúncio cadastrado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro: Situação de anúncio não foi cadastrado com sucesso.'));
        }
        $colors = $this->AnunciosSituations->Colors->find('list', ['limit' => 200]);
        $this->set(compact('anunciosSituation', 'colors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Anuncios Situation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $anunciosSituation = $this->AnunciosSituations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $anunciosSituation = $this->AnunciosSituations->patchEntity($anunciosSituation, $this->request->getData());
            if ($this->AnunciosSituations->save($anunciosSituation)) {
                $this->Flash->success(__('Situação de anúncio editado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro: Situação de anúncio não foi editado com sucesso.'));
        }
        $colors = $this->AnunciosSituations->Colors->find('list', ['limit' => 200]);
        $this->set(compact('anunciosSituation', 'colors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Anuncios Situation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $anunciosSituation = $this->AnunciosSituations->get($id);
        if ($this->AnunciosSituations->delete($anunciosSituation)) {
            $this->Flash->success(__('Situação de anúncio apagado com sucesso.'));
        } else {
            $this->Flash->error(__('Erro: Situação de anúncio não foi apagado com sucesso.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
