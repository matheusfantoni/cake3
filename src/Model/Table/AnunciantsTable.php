<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Anunciants Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Anunciant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Anunciant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Anunciant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Anunciant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anunciant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anunciant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Anunciant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Anunciant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AnunciantsTable extends Table
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

        $this->setTable('anunciants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 220)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 220)
            ->allowEmptyString('descricao');

        $validator
            ->scalar('imagem')
            ->maxLength('imagem', 220)
            ->allowEmptyFile('imagem');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 220)
            ->allowEmptyString('slug');

        $validator
            ->scalar('keywords')
            ->maxLength('keywords', 220)
            ->allowEmptyString('keywords');

        $validator
            ->scalar('description')
            ->maxLength('description', 220)
            ->allowEmptyString('description');

        $validator
            ->integer('qnt_acesso')
            ->allowEmptyString('qnt_acesso');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 45)
            ->allowEmptyString('telefone');

        $validator
            ->scalar('celular')
            ->maxLength('celular', 45)
            ->allowEmptyString('celular');

        $validator
            ->email('email')
            ->allowEmptyString('email');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function getVerAnunciant($user_id)
    {
        $query = $this->find()
            ->select(['id', 'telefone', 'celular'])
            ->where(['Anunciants.user_id =' => $user_id])
            ->order(['Anunciants.user_id' => 'ASC']);

        return $query->first();
    }
}
