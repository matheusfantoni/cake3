<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Robots Model
 *
 * @property \App\Model\Table\AnunciosTable&\Cake\ORM\Association\HasMany $Anuncios
 *
 * @method \App\Model\Entity\Robot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Robot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Robot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Robot|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Robot saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Robot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Robot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Robot findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RobotsTable extends Table
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

        $this->setTable('robots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Anuncios', [
            'foreignKey' => 'robot_id',
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
            /*->requirePresence('nome', 'create')*/
            ->notEmptyString('nome', 'Necessário preencher o campo nome');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 45)
            /*->requirePresence('tipo', 'create')*/
            ->notEmptyString('tipo', 'Necessário preencher o campo tipo');

        return $validator;
    }
}
