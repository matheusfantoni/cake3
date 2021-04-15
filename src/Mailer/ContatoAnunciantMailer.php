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

	public function msgContatoAnunciante($msgContAnunc)
	{
		$this->setTo($msgContAnunc->email)
			->setProfile('envemail')
			->setEmailFormat('html')
			->setTemplate('msg_cont_anunciante')
			->setLayout('contato_anunciant')
			->setViewVars([
				'nome' => $msgContAnunc->nome,
				'mensagem' => $msgContAnunc->mensagem,
				'emailCliente' => $msgContAnunc->emailCliente,
				'telefone' => $msgContAnunc->telefone
			])
			->setSubject(sprintf('Nova mensagem no seu anúncio!'));
	}
}
