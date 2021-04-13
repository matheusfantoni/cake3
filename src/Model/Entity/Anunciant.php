<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Anunciant Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $descricao
 * @property string|null $imagem
 * @property string|null $slug
 * @property string|null $keywords
 * @property string|null $description
 * @property int|null $qnt_acesso
 * @property string|null $telefone
 * @property string|null $celular
 * @property string|null $email
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Anunciant extends Entity
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
        'descricao' => true,
        'imagem' => true,
        'slug' => true,
        'keywords' => true,
        'description' => true,
        'qnt_acesso' => true,
        'telefone' => true,
        'celular' => true,
        'email' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
