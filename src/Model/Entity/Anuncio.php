<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Anuncio Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string $descricao
 * @property string $conteudo
 * @property string $imagem
 * @property string $slug
 * @property string $keywords
 * @property string $description
 * @property int $qnt_acesso
 * @property int $robot_id
 * @property int $user_id
 * @property int $anuncios_situation_id
 * @property int $cats_anuncio_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Robot $robot
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\AnunciosSituation $anuncios_situation
 * @property \App\Model\Entity\CatsAnuncio $cats_anuncio
 * @property \App\Model\Entity\Situation[] $situations
 */
class Anuncio extends Entity
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
        'titulo' => true,
        'descricao' => true,
        'conteudo' => true,
        'imagem' => true,
        'slug' => true,
        'keywords' => true,
        'description' => true,
        'qnt_acesso' => true,
        'robot_id' => true,
        'user_id' => true,
        'anuncios_situation_id' => true,
        'cats_anuncio_id' => true,
        'created' => true,
        'modified' => true,
        'robot' => true,
        'user' => true,
        'anuncios_situation' => true,
        'cats_anuncio' => true,
        'situations' => true,
    ];
}
