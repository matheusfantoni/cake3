<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContatosAnunciants Model
 *
 * @property \App\Model\Table\AnunciosTable&\Cake\ORM\Association\BelongsTo $Anuncios
 * @property \App\Model\Table\AnunciantsTable&\Cake\ORM\Association\BelongsTo $Anunciants
 *
 * @method \App\Model\Entity\ContatosAnunciant get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContatosAnunciant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContatosAnunciant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContatosAnunciant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContatosAnunciant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContatosAnunciant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContatosAnunciant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContatosAnunciant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContatosAnunciantsTable extends Table
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

        $this->setTable('contatos_anunciants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Anuncios', [
            'foreignKey' => 'anuncio_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Anunciants', [
            'foreignKey' => 'anunciant_id',
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
            ->allowEmptyString('nome');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 45)
            ->allowEmptyString('telefone');

        $validator
            ->scalar('mensagem')
            ->allowEmptyString('mensagem');

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
        //$rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['anuncio_id'], 'Anuncios'));
        $rules->add($rules->existsIn(['anunciant_id'], 'Anunciants'));

        return $rules;
    }
}
