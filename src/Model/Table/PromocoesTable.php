<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Promocaos Model
 *
 * @property \App\Model\Table\RobotsTable|\Cake\ORM\Association\BelongsTo $Robots
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\BelongsTo $Situations
 *
 * @method \App\Model\Entity\Promocao get($primaryKey, $options = [])
 * @method \App\Model\Entity\Promocao newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Promocao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Promocao|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promocao|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promocao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Promocao[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Promocao findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PromocoesTable extends Table
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

        $this->setTable('promocoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Upload');
        $this->addBehavior('UploadRed');
        $this->addBehavior('DeleteArq');
        $this->addBehavior('SlugUrl');

        $this->belongsTo('Robots', [
            'foreignKey' => 'robot_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 220)
            ->notEmptyString('titulo', 'Necessário preencher o campo titulo');

        $validator
            ->scalar('descricao')
            ->notEmptyString('descricao', 'Necessário preencher o campo descrição');

        $validator
            ->scalar('conteudo')
            ->notEmptyString('conteudo', 'Necessário preencher o campo conteúdo');

        $validator
            ->notEmptyString('imagem', 'Necessário selecionar a foto')
            ->add('imagem', 'file', [
                'rule' => ['mimeType', ['image/jpeg', 'image/png']],
                'message' => 'Extensão da foto inválida. Selecione foto JPEG ou PNG',
            ]);

        $validator
            ->scalar('slug')
            ->maxLength('slug', 220)
            ->notEmptyString('slug', 'Necessário preencher o campo slug');

        $validator
            ->scalar('keywords')
            ->maxLength('keywords', 220)
            ->notEmptyString('keywords', 'Necessário preencher o campo palavras chaves');

        $validator
            ->scalar('description')
            ->maxLength('description', 220)
            ->notEmptyString('description', 'Necessário preencher o campo resumo do anúncio');

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
        $rules->add($rules->existsIn(['situation_id'], 'Situations'));

        return $rules;
    }

    public function getListPromocao()
    {
        $query = $this->find()
            ->select(['id', 'titulo', 'imagem', 'slug'])
            ->where(['situation_id' => 1])
            ->order(['id' => 'DESC'])
            ->limit(20);
        return $query;
    }
}
