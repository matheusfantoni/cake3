<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatsAnuncios Model
 *
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\BelongsTo $Situations
 *
 * @method \App\Model\Entity\CatsAnuncio get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatsAnuncio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatsAnuncio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatsAnuncio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatsAnuncio|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatsAnuncio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatsAnuncio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatsAnuncio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatsAnunciosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('cats_anuncios');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('SlugUrl');

        $this->belongsTo('Situations', [
            'foreignKey' => 'situation_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 45)
            //->requirePresence('nome', 'create')
            ->notEmpty('nome', 'Nome da categoria de anúncio é obrigatório');

        $validator
            ->scalar('icone')
            ->maxLength('icone', 45)
            //->requirePresence('icone', 'create')
            ->notEmpty('icone', 'Ícone da categoria de anúncio é obrigatório');

        /*$validator
            ->integer('ordem')
            ->requirePresence('ordem', 'create')
            ->notEmpty('ordem');

        $validator
            ->integer('destaque_home')
            ->requirePresence('destaque_home', 'create')
            ->notEmpty('destaque_home');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 220)
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');*/

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['situation_id'], 'Situations'));

        return $rules;
    }

    public function getUltimaCatAnuncio()
    {
        $query = $this->find()
            ->select(['id', 'ordem'])
            ->order(['CatsAnuncios.ordem' => 'DESC']);
        return $query->first();
    }

    public function getListCatAnuncioProx($ordem)
    {
        $query = $this->find()
            ->select(['id', 'ordem'])
            ->where(['CatsAnuncios.ordem >' => $ordem])
            ->order(['CatsAnuncios.ordem' => 'ASC']);
        return $query;
    }

    public function getCatAnuncioAtual($id)
    {
        $query = $this->find()
            ->select(['id', 'ordem'])
            ->where(['CatsAnuncios.id =' => $id])
            ->order(['CatsAnuncios.ordem' => 'DESC']);
        return $query->first();
    }

    public function getCatAnuncioMenor($ordemMenor)
    {
        $query = $this->find()
            ->select(['id', 'ordem'])
            ->where(['CatsAnuncios.ordem =' => $ordemMenor])
            ->order(['CatsAnuncios.ordem' => 'DESC']);
        return $query->first();
    }

    public function getCatDestHome($id)
    {
        $query = $this->find()
            ->select(['id', 'destaque_home'])
            ->where(['CatsAnuncios.id =' => $id])
            ->order(['CatsAnuncios.id' => 'DESC']);
        return $query->first();
    }

    public function getListCatAnuncioDest()
    {
        $query = $this->find()
            ->select(['id', 'nome', 'destaque_home', 'Situations.nome_situacao', 'Colors.cor'])
            ->contain(['Situations', 'Situations.Colors'])
            ->where(['CatsAnuncios.destaque_home =' => 1])
            ->order(['CatsAnuncios.ordem' => 'ASC']);
        return $query;
    }

    public function getListCatAnuncHome()
    {
        $query = $this->find()
            ->select(['id', 'nome', 'icone', 'slug'])
            ->where([
                'CatsAnuncios.destaque_home =' => 1,
                'CatsAnuncios.situation_id =' => 1
            ])
            ->order(['CatsAnuncios.ordem' => 'ASC'])
            ->limit(7);

        return $query;
    }

    public function getListCatAnuncio()
    {
        $query = $this->find()
            ->select(['id', 'nome', 'icone', 'slug'])
            ->where(['CatsAnuncios.situation_id =' => 1])
            ->order(['CatsAnuncios.ordem' => 'ASC'])
            ->limit(50);

        return $query;
    }
}
