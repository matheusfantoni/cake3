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

        $this->loadModel('CatsAnuncios');
        $catAnuncio = $this->CatsAnuncios->getVerCatAnuncio($slug);

        if ($catAnuncio) {
            $anunciosTable = $this->loadModel('Anuncios');
            $this->paginate = [
                'limit' => 6,
                'conditions' => [
                    'Anuncios.cats_anuncio_id = ' => $catAnuncio->id
                ],
                'order' => [
                    'Anuncios.id' => 'DESC',

                ]
            ];

            $anuncios = $this->paginate($anunciosTable);
        } else {
            echo "Vazio";
        }

        $this->set(compact('anuncios'));
    }
}
