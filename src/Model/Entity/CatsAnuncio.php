<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CatsAnuncio Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $icone
 * @property int $ordem
 * @property int $destaque_home
 * @property string $slug
 * @property int $situation_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Situation $situation
 */
class CatsAnuncio extends Entity
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
        'icone' => true,
        'ordem' => true,
        'destaque_home' => true,
        'slug' => true,
        'situation_id' => true,
        'created' => true,
        'modified' => true,
        'situation' => true,
    ];
}
