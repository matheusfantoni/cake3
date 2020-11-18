<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity
{

    public $_accessible = [
        'id' => true,
        'name' => true,
        'email' => true,
        'username' => true,
        'password' => true,
        'created' => true,
        'modified' => true

    ];

    protected function _setPassword($password)
    {

        if (strlen($password) > 5) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
