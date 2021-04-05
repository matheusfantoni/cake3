<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Anuncios Model
 *
 * @property \App\Model\Table\RobotsTable&\Cake\ORM\Association\BelongsTo $Robots
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AnunciosSituationsTable&\Cake\ORM\Association\BelongsTo $AnunciosSituations
 * @property \App\Model\Table\CatsAnunciosTable&\Cake\ORM\Association\BelongsTo $CatsAnuncios
 * @property \App\Model\Table\SituationsTable&\Cake\ORM\Association\BelongsToMany $Situations
 *
 * @method \App\Model\Entity\Anuncio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Anuncio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Anuncio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Anuncio|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anuncio saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anuncio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Anuncio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Anuncio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AnunciosTable extends Table
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

        $this->setTable('anuncios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Robots', [
            'foreignKey' => 'robot_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('AnunciosSituations', [
            'foreignKey' => 'anuncios_situation_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('CatsAnuncios', [
            'foreignKey' => 'cats_anuncio_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Situations', [
            'foreignKey' => 'anuncio_id',
            'targetForeignKey' => 'situation_id',
            'joinTable' => 'anuncios_situations',
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
            ->scalar('titulo')
            ->maxLength('titulo', 220)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        $validator
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->scalar('conteudo')
            ->requirePresence('conteudo', 'create')
            ->notEmptyString('conteudo');

        $validator
            ->scalar('imagem')
            ->maxLength('imagem', 220)
            ->requirePresence('imagem', 'create')
            ->notEmptyFile('imagem');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 220)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->scalar('keywords')
            ->maxLength('keywords', 220)
            ->requirePresence('keywords', 'create')
            ->notEmptyString('keywords');

        $validator
            ->scalar('description')
            ->maxLength('description', 220)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('qnt_acesso')
            ->notEmptyString('qnt_acesso');

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
        $rules->add($rules->existsIn(['robot_id'], 'Robots'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['anuncios_situation_id'], 'AnunciosSituations'));
        $rules->add($rules->existsIn(['cats_anuncio_id'], 'CatsAnuncios'));

        return $rules;
    }
}