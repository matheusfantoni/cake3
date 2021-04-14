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
        
        $this->loadModel('Anuncios');
        $anuncio = $this->Anuncios->getVerAnuncio($slug);
                
        if($anuncio){
            
            $this->loadModel('Anunciants');
            $anunciant = $this->Anunciants->getVerAnunciant($anuncio->user_id);
            
        }
        
        $this->set(compact('anuncio', 'anunciant'));
    }
}
