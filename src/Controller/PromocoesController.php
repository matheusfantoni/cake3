<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Promocoes Controller
 *
 * @property \App\Model\Table\PromocoesTable $Promocoes
 *
 * @method \App\Model\Entity\Promoco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PromocoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
       
        $this->loadModel('Promocoes');
        $promocoes = $this->Promocoes->getListPromocao();
        
        $this->set(compact('promocoes'));
    }
}
