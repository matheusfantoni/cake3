<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        $this->addBehavior('Upload');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'created');

        $validator
            ->notEmptyString('name');

        $validator
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->notEmptyString('password')
            ->add('password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'A senha deve ter no mínimo 6 caracteres.',
                ]
            ]);

        $validator
            ->notEmpty('imagem', 'Necessário selecionar uma imagem')
            ->add('imagem', 'file', [
                'rule' => ['mimeType', ['image/jpeg', 'image/png']],
                'message' => 'Extensão da foto inválida. Selecione foto JPEG ou PNG',

            ]);

        return $validator;
    }

    /*
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email'], 'Este email já está sendo utilizado.'));
        $rules->add($rules->isUnique(['username', 'Este username já está sendo utilizado.']));
        return $rules;
    }
    */

    public function getUserDados($user_id)
    {

        return $query = $this->find()
            ->select(['id', 'name', 'email', 'imagem'])
            ->where(['Users.id' => $user_id])
            ->first();
    }
}
