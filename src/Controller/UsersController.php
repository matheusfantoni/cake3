<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController{

    public function index(){

        //$usuario = "Matheus";
        //$this->set(['usuarios' => $usuario]);

        $usuarios = $this->Users->find()->all();
        //$this->set(['usuarios' => $usuarios]);
        $this->set(compact('usuarios'));

    }

}