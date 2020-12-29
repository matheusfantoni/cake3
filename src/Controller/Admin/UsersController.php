<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'limit' => 40
        ];

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    public function perfil()
    {
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id);

        $this->set(compact('user'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário cadastrado com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->danger(__('Erro: Usuário não foi cadastrado com sucesso'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário editado com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->danger(__('Erro: Usuário não foi editado com sucesso'));
        }
        $this->set(compact('user'));
    }

    public function editSenha($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Senha do usuário editado com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->danger(__('Erro: A senha do usuário não foi editado com sucesso'));
        }
        $this->set(compact('user'));
    }

    public function editPerfil()
    {
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Perfil editado com sucesso'));

                return $this->redirect(['controller' => 'Users', 'action' => 'perfil']);
            }
            $this->Flash->danger(__('Erro: Perfil não foi editado com sucesso'));
        }

        $this->set(compact('user'));
    }

    public function editSenhaPerfil()
    {
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Senha editada com sucesso'));

                return $this->redirect(['controller' => 'Users', 'action' => 'perfil']);
            }
            $this->Flash->danger(__('Erro: Senha não foi editada com sucesso'));
        }

        $this->set(compact('user'));
    }

    public function alterarFotoPerfil()
    {
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id);
        $imagemAntiga = $user->imagem;


        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->newEntity();
            $user->imagem = $this->Users->slugSingleUpload($this->request->getData()['imagem']['name']);
            $user->id = $user_id;


            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $destino = WWW_ROOT . "files" . DS . "user" . DS . $user_id . DS;
                $imgUpload = $this->request->getData()['imagem'];
                $imgUpload['name'] = $user->imagem;

                if ($this->Users->singleUpload($imgUpload, $destino)) {
                    if (($imagemAntiga !== null) and ($imagemAntiga !== $user->imagem)) {
                        unlink($destino . $imagemAntiga);
                    }
                    $this->Flash->success(__('Foto editada com sucesso'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'perfil']);
                } else {
                    $user->imagem = $imagemAntiga;
                    $this->Users->save($user);
                    $this->Flash->danger(__('Erro: Foto não foi editada com sucesso. Erro ao realizar o upload.'));
                }
            } else {
                $this->Flash->danger(__('Erro: Foto não foi editada com sucesso.'));
            }
        }

        $this->set(compact('user'));
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuário apagado com sucesso'));
        } else {
            $this->Flash->danger(__('Erro: Usuário não foi apagado com sucesso'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->danger(__('Erro: login ou senha incorreto'));
            }
        }
    }

    public function logout()
    {
        $this->Flash->success(__('Deslogado com sucesso!'));
        return $this->redirect($this->Auth->logout());
    }
}
