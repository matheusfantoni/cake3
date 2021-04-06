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
        $this->addBehavior('UploadRed');
        $this->addBehavior('DeleteArq');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'created');

        $validator
            ->notEmptyString('name', 'O campo nome é obrigatório.')
            ->maxLength('name', 220);

        $validator
            ->requirePresence('email', 'create')
            ->notEmptyString('email', 'O campo email é obrigatório.');

        $validator
            ->requirePresence('username', 'create')
            ->notEmptyString('username', 'O campo usuário é obrigatório.');

        $validator
            ->notEmptyString('password')
            ->add('password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'A senha deve ter no mínimo 6 caracteres.',
                ]
            ]);

        $validator
            ->notEmptyString('imagem', 'Necessário selecionar uma imagem')
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

    public function getRecuperarSenha($email)
    {

        $query = $this->find()
            ->select(['id', 'recuperar_senha'])
            ->where(['Users.email' => $email]);
        return $query->first();
    }

    public function getAtualizarSenha($recuperar_senha)
    {

        $query = $this->find()
            ->select(['id'])
            ->where(['Users.recuperar_senha' => $recuperar_senha]);
        return $query->first();
    }
}
