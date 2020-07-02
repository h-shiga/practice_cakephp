<?php

namespace App\Model\Table;

use Cake\ORM\TableRegistry;

use Cake\ORM\Table;

class IamcatTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }
}
