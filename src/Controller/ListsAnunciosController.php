<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ListsAnuncios Controller
 *
 * @property \App\Model\Table\ListsAnunciosTable $ListsAnuncios
 *
 * @method \App\Model\Entity\ListsAnuncios[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ListsAnunciosController extends AppController
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
    public function index($slug = null)
    {
 
        //echo "<br><br><br><br><br>";
        //echo $slug;

        /*
        $catAnuncioTable = $this->loadModel('CatsAnuncios');
        $catAnuncios = $this->CatsAnuncios->getListCatAnuncio();*/

        $listsAnuncios = "Anuncios";

        $this->set(compact('listsAnuncios'));
    }
}
