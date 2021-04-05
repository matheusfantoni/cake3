<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Robot Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $tipo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Anuncio[] $anuncios
 */
class Robot extends Entity
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
        'tipo' => true,
        'created' => true,
        'modified' => true,
        'anuncios' => true,
    ];
}
