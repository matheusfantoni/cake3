<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carousels Model
 *
 * @property \App\Model\Table\PositionsTable|\Cake\ORM\Association\BelongsTo $Positions
 * @property \App\Model\Table\ColorsTable|\Cake\ORM\Association\BelongsTo $Colors
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\BelongsTo $Situations
 *
 * @method \App\Model\Entity\Carousel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Carousel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Carousel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Carousel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carousel|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carousel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Carousel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Carousel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CarouselsTable extends Table
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

        $this->setTable('carousels');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Upload');
        $this->addBehavior('UploadRed');
        $this->addBehavior('DeleteArq');

        $this->belongsTo('Positions', [
            'foreignKey' => 'position_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Colors', [
            'foreignKey' => 'color_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nome_carousel')
            ->maxLength('nome_carousel', 220)
            ->notEmpty('nome_carousel', 'Nome do carousel é obrigatório');

        $validator
            ->notEmpty('imagem', 'Necessário selecionar a foto')
            ->add('imagem', 'file', [
                'rule' => ['mimeType', ['image/jpeg', 'image/png']],
                'message' => 'Extensão da foto inválida. Selecione foto JPEG ou PNG',
            ]);

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 220)
            ->allowEmpty('titulo');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 220)
            ->allowEmpty('descricao');

        $validator
            ->scalar('titulo_botao')
            ->maxLength('titulo_botao', 220)
            ->allowEmpty('titulo_botao');

        $validator
            ->scalar('link')
            ->maxLength('link', 220)
            ->allowEmpty('link');

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
        $rules->add($rules->existsIn(['position_id'], 'Positions'));
        $rules->add($rules->existsIn(['color_id'], 'Colors'));
        $rules->add($rules->existsIn(['situation_id'], 'Situations'));

        return $rules;
    }

    public function getUltimoSlide()
    {
        $query = $this->find()
            ->select(['id', 'ordem'])
            ->order(['Carousels.ordem' => 'DESC']);
        return $query->first();
    }

    public function getListaSlideProx($ordem)
    {
        $query = $this->find()
            ->select(['id', 'ordem'])
            ->where(['Carousels.ordem >' => $ordem])
            ->order(['Carousels.ordem' => 'ASC']);
        return $query;
    }

    public function getListarSlidesHome()
    {
        $query = $this->find()
            ->select(['id', 'imagem' ,'titulo', 'descricao', 'titulo_botao', 'link',
            'ordem', 'position_id', 'color_id', 'Positions.posicao', 'Colors.cor'])
            ->contain(['Positions', 'Colors', 'Situations'])
            ->where(['Carousels.situation_id =' => 1])
            ->order(['Carousels.ordem' => 'ASC']);
        return $query;
    }

    public function getSlideAtual($id)
    {
        $query = $this->find()
            ->select(['id', 'ordem'])
            ->where(['Carousels.id =' => $id])
            ->order(['Carousels.ordem' => 'DESC']);
        return $query->first();
    }

    public function getSlideMenor($ordemMenor)
    {
        $query = $this->find()
            ->select(['id', 'ordem'])
            ->where(['Carousels.ordem =' => $ordemMenor])
            ->order(['Carousels.ordem' => 'DESC']);
        return $query->first();
    }
}
