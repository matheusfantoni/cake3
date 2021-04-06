<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AnunciosSituations Model
 *
 * @property \App\Model\Table\ColorsTable&\Cake\ORM\Association\BelongsTo $Colors
 * @property \App\Model\Table\AnunciosTable&\Cake\ORM\Association\HasMany $Anuncios
 *
 * @method \App\Model\Entity\AnunciosSituation get($primaryKey, $options = [])
 * @method \App\Model\Entity\AnunciosSituation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AnunciosSituation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AnunciosSituation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AnunciosSituation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AnunciosSituation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AnunciosSituation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AnunciosSituation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AnunciosSituationsTable extends Table
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

        $this->setTable('anuncios_situations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Colors', [
            'foreignKey' => 'color_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Anuncios', [
            'foreignKey' => 'anuncios_situation_id',
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
            ->scalar('nome_situacao')
            ->maxLength('nome_situacao', 45)
            /*->requirePresence('nome_situacao', 'create')*/
            ->notEmptyString('nome_situacao', 'Necessário preencher o campo nome da situação.');

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
        $rules->add($rules->existsIn(['color_id'], 'Colors'));

        return $rules;
    }
}
