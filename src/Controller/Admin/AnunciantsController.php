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
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $anunciants = $this->paginate($this->Anunciants);

        $this->set(compact('anunciants'));
    }

    /**
     * View method
     *
     * @param string|null $id Anunciant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $anunciant = $this->Anunciants->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('anunciant', $anunciant);
    }

    public function viewAnunciante($id = null)
    {
        $id_user = $this->Auth->user('id');
        $anunciant = $this->Anunciants->getVerAnunciantAdm($id_user);
        
        if ($anunciant) {
            $this->set(compact('anunciant'));
        } else {
            return $this->redirect(['controller' => 'Anunciants', 'action' => 'addAnunciante']);
        }
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

            if (!$anunciant->getErrors()) {

                $anunciant->imagem = $this->Anunciants->slugUploadImgRed($this->request->getData()['imagem']['name']);
                $anunciant->slug = $this->Anunciants->slugUrlSimples($this->request->getData()['slug']);

                if ($resultSave = $this->Anunciants->save($anunciant)) {
                    $id = $resultSave->id; // último id inserido

                    $anunciant->slug = $this->Anunciants->slugUrlSimples($this->request->getData()['slug'] . "-" . $id);
                    $this->Anunciants->save($anunciant);

                    $destino = WWW_ROOT . "files" . DS . "anunciant" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['imagem'];
                    $imgUpload['name'] = $anunciant->imagem;

                    if ($this->Anunciants->uploadImgRed($imgUpload, $destino, 500, 400)) {
                        $this->Flash->success(__('Anunciante cadastrado com sucesso'));
                        return $this->redirect(['controller' => 'Anunciants', 'action' => 'view', $id]);
                    } else {
                        $this->Flash->danger(__('Erro: Anunciante não foi cadastrado com sucesso. Erro ao realizar o upload'));
                    }
                } else {
                    $this->Flash->error(__('Erro: Anunciante não foi cadastrado com sucesso'));
                }
            } else {
                $this->Flash->error(__('Erro: Anunciante não foi cadastrado com sucesso'));
            }
        }
        $users = $this->Anunciants->Users->find('list', ['limit' => 200]);
        $this->set(compact('anunciant', 'users'));
    }

    // Método para criação do anunciante

    public function addAnunciante()
    {

        $anunciant = $this->Anunciants->newEntity();
        if ($this->request->is('post')) {
            $anunciant = $this->Anunciants->patchEntity($anunciant, $this->request->getData());

            if (!$anunciant->getErrors()) {

                $anunciant->imagem = $this->Anunciants->slugUploadImgRed($this->request->getData()['imagem']['name']);
                $anunciant->slug = $this->Anunciants->slugUrlSimples($this->request->getData()['slug']);
                $anunciant->user_id = $this->Auth->user('id');

                if ($resultSave = $this->Anunciants->save($anunciant)) {
                    $id = $resultSave->id; // último id inserido

                    $anunciant->slug = $this->Anunciants->slugUrlSimples($this->request->getData()['slug'] . "-" . $id);
                    $this->Anunciants->save($anunciant);

                    $destino = WWW_ROOT . "files" . DS . "anunciant" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['imagem'];
                    $imgUpload['name'] = $anunciant->imagem;

                    if ($this->Anunciants->uploadImgRed($imgUpload, $destino, 500, 400)) {
                        $this->Flash->success(__('Anunciante cadastrado com sucesso'));
                        return $this->redirect(['controller' => 'Anunciants', 'action' => 'viewAnunciante']);
                    } else {
                        $this->Flash->danger(__('Erro: Anunciante não foi cadastrado com sucesso. Erro ao realizar o upload'));
                    }
                } else {
                    $this->Flash->error(__('Erro: Anunciante não foi cadastrado com sucesso'));
                }
            } else {
                $this->Flash->error(__('Erro: Anunciante não foi cadastrado com sucesso'));
            }
        }
  
        $this->set(compact('anunciant'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Anunciant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $anunciant = $this->Anunciants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $anunciant = $this->Anunciants->patchEntity($anunciant, $this->request->getData());
            $anunciant->slug = $this->Anunciants->slugUrlSimples($this->request->getData()['slug'] . "-" . $id);
            if ($this->Anunciants->save($anunciant)) {
                $this->Flash->success(__('Anunciante editado com sucesso'));
                return $this->redirect(['controller' => 'Anunciants', 'action' => 'view', $id]);
            } else {
                $this->Flash->error(__('Erro: Anunciante não foi editado com sucesso'));
            }
        }
        $users = $this->Anunciants->Users->find('list', ['limit' => 200]);
        $this->set(compact('anunciant', 'users'));
    }

    public function editAnunciante()
    {   
        $id_user = $this->Auth->user('id');
        $anunciant = $this->Anunciants->getEditAnunciantAdmin($id_user);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $anunciant = $this->Anunciants->patchEntity($anunciant, $this->request->getData());
            $anunciant->slug = $this->Anunciants->slugUrlSimples($this->request->getData()['slug'] . "-" . $id_user);
            
            if ($this->Anunciants->save($anunciant)) {
                $this->Flash->success(__('Anunciante editado com sucesso'));
                return $this->redirect(['controller' => 'Anunciants', 'action' => 'viewAnunciante']);
            } else {
                $this->Flash->error(__('Erro: Anunciante não foi editado com sucesso'));
            }
        }
        
        $this->set(compact('anunciant'));
    }

    public function alterarFotoAnunciante($id = null)
    {
        $anunciant = $this->Anunciants->get($id);
        $imagemAntiga = $anunciant->imagem;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $anunciant = $this->Anunciants->newEntity();
            $anunciant = $this->Anunciants->patchEntity($anunciant, $this->request->getData());
            if (!$anunciant->getErrors()) {
                $anunciant->imagem = $this->Anunciants->slugUploadImgRed($this->request->getData()['imagem']['name']);
                $anunciant->id = $id;
                if ($this->Anunciants->save($anunciant)) {
                    $destino = WWW_ROOT . "files" . DS . "anunciant" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['imagem'];
                    $imgUpload['name'] = $anunciant->imagem;

                    if ($this->Anunciants->uploadImgRed($imgUpload, $destino, 500, 400)) {
                        $this->Anunciants->deleteFile($destino, $imagemAntiga, $anunciant->imagem);
                        $this->Flash->success(__('Imagem editada com sucesso'));
                        return $this->redirect(['controller' => 'Anunciants', 'action' => 'view', $id]);
                    } else {
                        $anunciant->imagem = $imagemAntiga;
                        $this->Anunciants->save($anunciant);
                        $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso. Erro ao realizar o upload'));
                    }
                } else {
                    $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso.'));
                }
            } else {
                $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso.'));
            }
        }

        $this->set(compact('anunciant'));
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
        $destino = WWW_ROOT . "files" . DS . "anunciant" . DS . $anunciant->id . DS;
        $this->Anunciants->deleteArq($destino);

        if ($this->Anunciants->delete($anunciant)) {
            $this->Flash->success(__('Anunciante apagado com sucesso'));
        } else {
            $this->Flash->error(__('Erro: Anunciante não foi apagado com sucesso'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
