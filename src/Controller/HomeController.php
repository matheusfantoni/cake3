<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Home Controller
 *
 * @property \App\Model\Table\HomeTable $Home
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{


    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Carousels');
        $carousels = $this->Carousels->getListarSlidesHome();

        $this->loadModel('CatsAnuncios');
        $catAnuncios = $this->CatsAnuncios->getListCatAnuncHome();

        $this->set(compact('carousels', 'catAnuncios'));
    }
}
