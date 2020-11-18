<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity{

    public $_accessible = [
        'id' => true,
        'name' => true,
        'email' => true,
        'username' => true,
        'password' => true,
        'created' => true,
        'modified' => true

    ];
}

