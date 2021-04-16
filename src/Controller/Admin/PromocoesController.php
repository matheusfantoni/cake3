<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Promocoes Controller
 *
 * @property \App\Model\Table\PromocoesTable $Promocoes
 *
 * @method \App\Model\Entity\Promocao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PromocoesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Robots', 'Users', 'Situations', 'Situations.Colors']
        ];
        $promocoes = $this->paginate($this->Promocoes);

        $this->set(compact('promocoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Promocao id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $promocao = $this->Promocoes->get($id, [
            'contain' => ['Robots', 'Users', 'Situations', 'Situations.Colors']
        ]);

        $this->set('promocao', $promocao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $promocao = $this->Promocoes->newEntity();
        if ($this->request->is('post')) {
            $promocao = $this->Promocoes->patchEntity($promocao, $this->request->getData());

            if (!$promocao->getErrors()) {
                $promocao->imagem = $this->Promocoes->slugUploadImgRed($this->request->getData()['imagem']['name']);
                $promocao->slug = $this->Promocoes->slugUrlSimples($this->request->getData()['slug']);
                $promocao->robot_id = 1;
                $promocao->user_id = $this->Auth->user('id');
                if ($resultSave = $this->Promocoes->save($promocao)) {
                    $id = $resultSave->id; // último id inserido

                    $promocao->slug = $this->Promocoes->slugUrlSimples($this->request->getData()['slug'] . "-" . $id);
                    $this->Promocoes->save($promocao);

                    $destino = WWW_ROOT . "files" . DS . "promocao" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['imagem'];
                    $imgUpload['name'] = $promocao->imagem;

                    if ($this->Promocoes->uploadImgRed($imgUpload, $destino, 948, 481)) {
                        $this->Flash->success(__('Promoção cadastrada com sucesso'));
                        return $this->redirect(['controller' => 'Promocoes', 'action' => 'view', $id]);
                    } else {
                        $this->Flash->danger(__('Erro: Promoção não foi cadastrada com sucesso. Erro ao realizar o upload'));
                    }
                } else {
                    $this->Flash->danger(__('Erro: Promoção não foi cadastrada com sucesso'));
                }
            } else {
                $this->Flash->danger(__('Erro: Promoção não foi cadastrada com sucesso'));
            }
        }
        $robots = $this->Promocoes->Robots->find('list', ['limit' => 200]);
        $users = $this->Promocoes->Users->find('list', ['limit' => 200]);
        $situations = $this->Promocoes->Situations->find('list', ['limit' => 200]);
        $this->set(compact('promocao', 'robots', 'users', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Promocao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $promocao = $this->Promocoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promocao = $this->Promocoes->patchEntity($promocao, $this->request->getData());
            if ($this->Promocoes->save($promocao)) {
                $this->Flash->success(__('Promoção editada com sucesso!.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->danger(__('Erro: Promoção não foi editada com sucesso!'));
        }
        $robots = $this->Promocoes->Robots->find('list', ['limit' => 200]);
        $users = $this->Promocoes->Users->find('list', ['limit' => 200]);
        $situations = $this->Promocoes->Situations->find('list', ['limit' => 200]);
        $this->set(compact('promocao', 'robots', 'users', 'situations'));
    }

    public function alterarFotoPromocao($id = null)
    {
        $promocao = $this->Promocoes->get($id);
        $imagemAntiga = $promocao->imagem;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $promocao = $this->Promocoes->newEntity();
            $promocao = $this->Promocoes->patchEntity($promocao, $this->request->getData());
            if (!$promocao->getErrors()) {
                $promocao->imagem = $this->Promocoes->slugUploadImgRed($this->request->getData()['imagem']['name']);
                $promocao->id = $id;
                if ($this->Promocoes->save($promocao)) {
                    $destino = WWW_ROOT . "files" . DS . "promocao" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['imagem'];
                    $imgUpload['name'] = $promocao->imagem;

                    if ($this->Promocoes->uploadImgRed($imgUpload, $destino, 948, 481)) {
                        $this->Promocoes->deleteFile($destino, $imagemAntiga, $promocao->imagem);
                        $this->Flash->success(__('Imagem editada com sucesso'));
                        return $this->redirect(['controller' => 'Promocoes', 'action' => 'view', $id]);
                    } else {
                        $promocao->imagem = $imagemAntiga;
                        $this->Users->save($promocao);
                        $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso. Erro ao realizar o upload'));
                    }
                } else {
                    $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso.'));
                }
            } else {
                $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso.'));
            }
        }

        $this->set(compact('promocao'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Promocao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promocao = $this->Promocoes->get($id);
        $destino = WWW_ROOT . "files" . DS . "promocao" . DS . $promocao->id . DS;
        $this->Promocoes->deleteArq($destino);

        if ($this->Promocoes->delete($promocao)) {
            $this->Flash->success(__('Promoção apagada com sucesso.'));
        } else {
            $this->Flash->error(__('Erro: Promoção não foi apagada com sucesso!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
