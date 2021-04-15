<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ContatosAnunciants Controller
 *
 * @property \App\Model\Table\ContatosAnunciantsTable $ContatosAnunciants
 *
 * @method \App\Model\Entity\ContatosAnunciant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContatosAnunciantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Anuncios', 'Anunciants']
        ];
        $contatosAnunciants = $this->paginate($this->ContatosAnunciants);

        $this->set(compact('contatosAnunciants'));
    }

    /**
     * View method
     *
     * @param string|null $id Contatos Anunciant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contatosAnunciant = $this->ContatosAnunciants->get($id, [
            'contain' => ['Anuncios', 'Anunciants']
        ]);

        $this->set('contatosAnunciant', $contatosAnunciant);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contatosAnunciant = $this->ContatosAnunciants->newEntity();
        if ($this->request->is('post')) {
            $contatosAnunciant = $this->ContatosAnunciants->patchEntity($contatosAnunciant, $this->request->getData());
            if ($this->ContatosAnunciants->save($contatosAnunciant)) {
                $this->Flash->success(__('The contatos anunciant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contatos anunciant could not be saved. Please, try again.'));
        }
        $anuncios = $this->ContatosAnunciants->Anuncios->find('list', ['limit' => 200]);
        $anunciants = $this->ContatosAnunciants->Anunciants->find('list', ['limit' => 200]);
        $this->set(compact('contatosAnunciant', 'anuncios', 'anunciants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contatos Anunciant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contatosAnunciant = $this->ContatosAnunciants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contatosAnunciant = $this->ContatosAnunciants->patchEntity($contatosAnunciant, $this->request->getData());
            if ($this->ContatosAnunciants->save($contatosAnunciant)) {
                $this->Flash->success(__('The contatos anunciant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contatos anunciant could not be saved. Please, try again.'));
        }
        $anuncios = $this->ContatosAnunciants->Anuncios->find('list', ['limit' => 200]);
        $anunciants = $this->ContatosAnunciants->Anunciants->find('list', ['limit' => 200]);
        $this->set(compact('contatosAnunciant', 'anuncios', 'anunciants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contatos Anunciant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contatosAnunciant = $this->ContatosAnunciants->get($id);
        if ($this->ContatosAnunciants->delete($contatosAnunciant)) {
            $this->Flash->success(__('Contato com anunciante apagado com sucesso'));
        } else {
            $this->Flash->error(__('Erro: Contato com anunciante não foi apagado com sucesso'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
