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
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'created');

        $validator
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email'], 'Este email já está sendo utilizado.'));
        $rules->add($rules->isUnique(['username', 'Este username já está sendo utilizado.']));
        return $rules;
    }
}
