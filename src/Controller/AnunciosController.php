<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Mailer\MailerAwareTrait;

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
    use MailerAwareTrait;
    public function view($slug = null)
    {

        $this->loadModel('ContatosAnunciants');
        $contatosAnunciant = $this->ContatosAnunciants->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $contatosAnunciant = $this->ContatosAnunciants->patchEntity($contatosAnunciant, $this->request->getData());

            if (!$contatosAnunciant->getErrors()) {
                if ($this->ContatosAnunciants->save($contatosAnunciant)) {

                    $this->getMailer('ContatoAnunciant')->send('msgContatoCliente', [$contatosAnunciant]);

                    $this->Flash->success(__('Mensagem enviada com sucesso.'));

                } else {
                    $this->Flash->error(__('Erro: Mensagem não foi enviada com sucesso.'));
                }
            }
        }

        $this->loadModel('Anuncios');
        $anuncio = $this->Anuncios->getVerAnuncio($slug);

        if ($anuncio) {
            $this->loadModel('Anunciants');
            $anunciant = $this->Anunciants->getVerAnunciant($anuncio->user_id);
        }

        $this->set(compact('contatosAnunciant', 'anuncio', 'anunciant'));
    }
}
