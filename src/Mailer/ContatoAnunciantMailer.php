<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * ContatoAnunciant mailer.
 */
class ContatoAnunciantMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'ContatoAnunciant';

    public function msgContatoCliente($msgContAnuncCli)
    {
    	$this->setTo($msgContAnuncCli->email)
    	->setProfile('envemail')
    	->setEmailFormat('html')
    	->setTemplate('msg_cont_cliente')
    	->setLayout('contato_anunciant')
    	->setViewVars(['nome' => $msgContAnuncCli->nome, 'mensagem' => $msgContAnuncCli->mensagem])
    	->setSubject(sprintf('Mensagem enviada para o anunciante!'));
    }


}
