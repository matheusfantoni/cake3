<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Anuncios Controller
 *
 * @property \App\Model\Table\ListsAnunciosTable $Anuncios
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnunciosController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function view($slug = null)
    {

        $this->loadModel('ContatosAnunciants');
        $contatosAnunciant = $this->ContatosAnunciants->newEntity();

        if ($this->request->is(['patch', 'post'])) {
            $contatosAnunciant = $this->ContatosAnunciants->patchEntity($contatosAnunciant, $this->request->getData());

            $contatosAnunciant->anuncio_id = 1;
            $contatosAnunciant->anunciant_id = 1;
            $this->ContatosAnunciants->save($contatosAnunciant);

        } 

        $this->loadModel('Anuncios');
        $anuncio = $this->Anuncios->getVerAnuncio($slug);

        if ($anuncio) {

            $this->loadModel('Anunciants');
            $anunciant = $this->Anunciants->getVerAnunciant($anuncio->user_id);
        }

        $this->set(compact('anuncio', 'anunciant', 'contatosAnunciant'));
    }
}
