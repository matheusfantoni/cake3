<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Anuncios Model
 *
 * @property \App\Model\Table\RobotsTable|\Cake\ORM\Association\BelongsTo $Robots
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AnunciosSituationsTable|\Cake\ORM\Association\BelongsTo $AnunciosSituations
 * @property \App\Model\Table\CatsAnunciosTable|\Cake\ORM\Association\BelongsTo $CatsAnuncios
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\BelongsToMany $Situations
 *
 * @method \App\Model\Entity\Anuncio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Anuncio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Anuncio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Anuncio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anuncio|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
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
        $this->belongsTo('AnunciosSituations', [
            'foreignKey' => 'anuncios_situation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CatsAnuncios', [
            'foreignKey' => 'cats_anuncio_id',
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
            //->requirePresence('titulo', 'create')
            ->notEmptyString('titulo', 'Necessário preencher o campo titulo');

        $validator
            ->scalar('descricao')
            //->requirePresence('descricao', 'create')
            ->notEmptyString('descricao', 'Necessário preencher o campo descrição');

        $validator
            ->scalar('conteudo')
            //->requirePresence('conteudo', 'create')
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
            //->requirePresence('slug', 'create')
            ->notEmptyString('slug', 'Necessário preencher o campo slug');

        $validator
            ->scalar('keywords')
            ->maxLength('keywords', 220)
            //->requirePresence('keywords', 'create')
            ->notEmptyString('keywords', 'Necessário preencher o campo palavras chaves');

        $validator
            ->scalar('description')
            ->maxLength('description', 220)
            //->requirePresence('description', 'create')
            ->notEmptyString('description', 'Necessário preencher o campo resumo do anúncio');

        $validator
            ->integer('qnt_acesso')
            //->requirePresence('qnt_acesso', 'create')
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

    public function getAnuncioUltimos()
    {
        $query = $this->find()
            ->select(['id', 'titulo', 'imagem', 'slug'])
            ->where(['Anuncios.anuncios_situation_id =' => 1])
            ->order(['Anuncios.id' => 'DESC'])
            ->limit(5);

        return $query;
    }

    public function getCatAnuncioUltimos($id = null)
    {
        $query = $this->find()
            ->select(['id', 'titulo', 'imagem', 'slug'])
            ->where([
                'Anuncios.anuncios_situation_id =' => 1,
                'Anuncios.cats_anuncio_id = ' => $id
            ])
            ->order(['Anuncios.id' => 'DESC'])
            ->limit(5);

        return $query;
    }

    public function getCatAnuncioDest($id = null)
    {
        $query = $this->find()
            ->select(['id', 'titulo', 'imagem', 'slug'])
            ->where([
                'Anuncios.anuncios_situation_id =' => 1,
                'Anuncios.cats_anuncio_id = ' => $id
            ])
            ->order(['Anuncios.qnt_acesso' => 'DESC'])
            ->limit(5);

        return $query;
    }

    public function getAnuncioDest()
    {
        $query = $this->find()
            ->select(['id', 'titulo', 'imagem', 'slug'])
            ->where(['Anuncios.anuncios_situation_id =' => 1])
            ->order(['Anuncios.qnt_acesso' => 'DESC'])
            ->limit(5);

        return $query;
    }

    public function getListAnuncioDest()
    {
        $query = $this->find()
            ->select(['id', 'titulo', 'descricao', 'imagem', 'slug'])
            ->where(['Anuncios.anuncios_situation_id =' => 1])
            ->order(['Anuncios.id' => 'DESC'])
            ->limit(5);

        return $query;
    }

    public function getVerAnuncio($slug)
    {
        $query = $this->find()
            ->select(['id', 'titulo', 'conteudo', 'user_id' ,'imagem', 'created'])
            ->where(['Anuncios.anuncios_situation_id =' => 1, 'Anuncios.slug =' => $slug])
            ->order(['Anuncios.id' => 'ASC']);
            
        return $query->first();
    }
}
