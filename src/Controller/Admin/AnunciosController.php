<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Anuncios Controller
 *
 * @property \App\Model\Table\AnunciosTable $Anuncios
 *
 * @method \App\Model\Entity\Anuncio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnunciosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Robots', 'Users', 'AnunciosSituations', 'AnunciosSituations.Colors', 'CatsAnuncios']
        ];
        $anuncios = $this->paginate($this->Anuncios);

        $this->set(compact('anuncios'));
    }

    /**
     * View method
     *
     * @param string|null $id Anuncio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $anuncio = $this->Anuncios->get($id, [
            'contain' => ['Robots', 'Users', 'AnunciosSituations', 'AnunciosSituations.Colors', 'CatsAnuncios']
        ]);

        $this->set('anuncio', $anuncio);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $anuncio = $this->Anuncios->newEntity();
        if ($this->request->is('post')) {
            $anuncio = $this->Anuncios->patchEntity($anuncio, $this->request->getData());

            if (!$anuncio->getErrors()) {

                $anuncio->imagem = $this->Anuncios->slugUploadImgRed($this->request->getData()['imagem']['name']);
                $anuncio->slug = $this->Anuncios->slugUrlSimples($this->request->getData()['slug']);
                $anuncio->robot_id = 1;
                $anuncio->user_id = $this->Auth->user('id');
                if ($resultSave = $this->Anuncios->save($anuncio)) {
                    $id = $resultSave->id; // último id inserido

                    $anuncio->slug = $this->Anuncios->slugUrlSimples($this->request->getData()['slug'] . "-" . $id);
                    $this->Anuncios->save($anuncio);

                    $destino = WWW_ROOT . "files" . DS . "anuncio" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['imagem'];
                    $imgUpload['name'] = $anuncio->imagem;

                    if ($this->Anuncios->uploadImgRed($imgUpload, $destino, 500, 400)) {
                        $this->Flash->success(__('Anúncio cadastrado com sucesso'));
                        return $this->redirect(['controller' => 'Anuncios', 'action' => 'view', $id]);
                    } else {
                        $this->Flash->danger(__('Erro: Anúncio não foi cadastrado com sucesso. Erro ao realizar o upload'));
                    }
                } else {
                    $this->Flash->error(__('Erro: Anúncio não foi cadastrado com sucesso'));
                }
            } else {
                $this->Flash->error(__('Erro: Anúncio não foi cadastrado com sucesso'));
            }
        }
        $robots = $this->Anuncios->Robots->find('list', ['limit' => 200]);
        $users = $this->Anuncios->Users->find('list', ['limit' => 200]);
        $anunciosSituations = $this->Anuncios->AnunciosSituations->find('list', ['limit' => 200]);
        $catsAnuncios = $this->Anuncios->CatsAnuncios->find('list', ['limit' => 200]);
        $this->set(compact('anuncio', 'robots', 'users', 'anunciosSituations', 'catsAnuncios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Anuncio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $anuncio = $this->Anuncios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $anuncio = $this->Anuncios->patchEntity($anuncio, $this->request->getData());
            $anuncio->slug = $this->Anuncios->slugUrlSimples($this->request->getData()['slug'] . "-" . $id);
            if ($this->Anuncios->save($anuncio)) {
                $this->Flash->success(__('Anúncio editado com sucesso'));
                return $this->redirect(['controller' => 'Anuncios', 'action' => 'view', $id]);
            }
            $this->Flash->error(__('Erro: Anúncio não foi editado com sucesso'));
        }
        $robots = $this->Anuncios->Robots->find('list', ['limit' => 200]);
        $users = $this->Anuncios->Users->find('list', ['limit' => 200]);
        $anunciosSituations = $this->Anuncios->AnunciosSituations->find('list', ['limit' => 200]);
        $catsAnuncios = $this->Anuncios->CatsAnuncios->find('list', ['limit' => 200]);
        $this->set(compact('anuncio', 'robots', 'users', 'anunciosSituations', 'catsAnuncios'));
    }

    public function alterarFotoAnuncio($id = null)
    {
        $anuncio = $this->Anuncios->get($id);
        $imagemAntiga = $anuncio->imagem;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $anuncio = $this->Anuncios->newEntity();
            $anuncio = $this->Anuncios->patchEntity($anuncio, $this->request->getData());
            if (!$anuncio->getErrors()) {
                $anuncio->imagem = $this->Anuncios->slugUploadImgRed($this->request->getData()['imagem']['name']);
                $anuncio->id = $id;
                if ($this->Anuncios->save($anuncio)) {
                    $destino = WWW_ROOT . "files" . DS . "anuncio" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['imagem'];
                    $imgUpload['name'] = $anuncio->imagem;

                    if ($this->Anuncios->uploadImgRed($imgUpload, $destino, 500, 400)) {
                        $this->Anuncios->deleteFile($destino, $imagemAntiga, $anuncio->imagem);
                        $this->Flash->success(__('Imagem editada com sucesso'));
                        return $this->redirect(['controller' => 'Anuncios', 'action' => 'view', $id]);
                    } else {
                        $anuncio->imagem = $imagemAntiga;
                        $this->Users->save($anuncio);
                        $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso. Erro ao realizar o upload'));
                    }
                } else {
                    $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso.'));
                }
            } else {
                $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso.'));
            }
        }

        $this->set(compact('anuncio'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Anuncio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $anuncio = $this->Anuncios->get($id);
        $destino = WWW_ROOT . "files" . DS . "anuncio" . DS . $anuncio->id . DS;
        $this->Anuncios->deleteArq($destino);

        if ($this->Anuncios->delete($anuncio)) {
            $this->Flash->success(__('Anúncio apagado com sucesso'));
        } else {
            $this->Flash->error(__('Erro: Anúncio não foi apagado com sucesso'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
