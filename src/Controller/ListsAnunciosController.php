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
        //echo "ID: " . $page;
        $this->loadModel('CatsAnuncios');
        $catAnuncio = $this->CatsAnuncios->getVerCatAnuncio($slug);
        
        $anuncios = null;
        $anunciosListDests = null;
        if($catAnuncio){
            $anuncioTable = $this->loadModel('Anuncios');
            $this->paginate = [
                'limit' => 6,
                'conditions' => [
                    'Anuncios.cats_anuncio_id = ' => $catAnuncio->id,
                    'Anuncios.anuncios_situation_id = ' => 1
                ],
                'order' => [
                    'Anuncios.id' => 'desc',
                ]
            ];
            $anuncios = $this->paginate($anuncioTable);
            $anunciosUltimos = $this->Anuncios->getCatAnuncioUltimos($catAnuncio->id);

            $anunciosDests = $this->Anuncios->getCatAnuncioDest($catAnuncio->id);
            //$anunciosDests = $anuncioTable->getAnuncioDest();
        }else{
            
            $this->loadModel('Anuncios');
            $anunciosUltimos = $this->Anuncios->getAnuncioUltimos();
            $anunciosDests = $this->Anuncios->getAnuncioDest();
            $anunciosListDests = $this->Anuncios->getListAnuncioDest();            
        }

        $this->set(compact('anuncios', 'anunciosUltimos', 'anunciosDests', 'anunciosListDests'));
    }
}
