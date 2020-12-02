<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class UsersController extends AppController
{

    public function index()
    {

        $this->paginate = [
            'limit' => 40

        ];

        $usuarios = $this->paginate($this->Users);
        $this->set(compact('usuarios'));
    }

    public function view($id = null)
    {

        $usuario = $this->Users->get($id);

        $this->set(['usuario' => $usuario]);
    }

    public function perfil()
    {

        $usuario = $this->Auth->user();

        $this->set(compact('usuario'));
    }

    public function add()
    {

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->danger(__('Usuário não foi cadastrado, verifique os dados.'));
            }
        }

        $this->set(compact('user'));
    }

    public function edit($id = null)
    {

        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário editado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Usuário não foi editado, verifique os dados.'));
            }
        }

        $this->set(compact('user'));
    }


    public function editSenha($id = null)
    {

        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Senha do usuário editada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro: A senha do usuário não foi editada, verifique os dados.'));
            }
        }

        $this->set(compact('user'));
    }

    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {
            $this->Flash->success(('Usuário deletado com sucesso.'));
        } else {
            $this->Flash->danger(__('Usuário não foi apagado com sucesso.'));
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
                $this->Flash->danger(__('Erro: login ou senha incorretos'));
            }
        }
    }

    public function logout()
    {

        $this->Flash->success(__('Logout realizado com sucesso!'));
        return $this->redirect($this->Auth->logout());
    }


    public function editPerfil()
    {

        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id, [
            'contain' => []
        ]);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                if ($this->Auth->user('id') === $user->id) {
                    $data = $user->toArray();
                    $this->Auth->setUser($data);
                }
                $this->Flash->success(__('Perfil editado com sucesso.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'perfil']);
            } else {
                $this->Flash->error(__('Perfil não foi editado, verifique os dados.'));
            }
        }

        $this->set(compact('user'));
    }

    public function editSenhaPerfil()
    {

        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id, [
            'contain' => []
        ]);


        if ($this->request->is(['post', 'put', 'patch'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) 

                $this->Flash->success(__('Senha editada com sucesso.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'perfil']);
            } else {
                $this->Flash->error(__('Sua senha não foi editada, verifique os dados.'));
            }
        
        $this->set(compact('user'));
    }
}
