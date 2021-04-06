<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ListsAnuncios Controller
 *
 * @property \App\Model\Table\ListsAnunciosTable $ListsAnuncios
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
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
        //echo "<br><br><br><br>" ;
        //echo $slug;
        
        $this->loadModel('CatsAnuncios');
        $catAnuncio = $this->CatsAnuncios->getVerCatAnuncio($slug);

        if ($catAnuncio) {
            $anuncioTable = $this->loadModel('Anuncios');
            $this->paginate = [
                'limit' => 6,
                'conditions' => [
                    'Anuncios.cats_anuncio_id = ' => $catAnuncio->id
                ],
                'order' => [
                    'Anuncios.id' => 'desc',
                ]
            ];
            $anuncios = $this->paginate($anuncioTable);
        } else {
            echo "Vazio";
        }



        $this->set(compact('anuncios'));
    }
}
