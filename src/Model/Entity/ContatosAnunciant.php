<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContatosAnunciant Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $email
 * @property string|null $telefone
 * @property string|null $mensagem
 * @property int $anuncio_id
 * @property int $anunciant_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Anuncio $anuncio
 * @property \App\Model\Entity\Anunciant $anunciant
 */
class ContatosAnunciant extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'email' => true,
        'telefone' => true,
        'mensagem' => true,
        'anuncio_id' => true,
        'anunciant_id' => true,
        'created' => true,
        'modified' => true,
        'anuncio' => true,
        'anunciant' => true,
    ];
}
