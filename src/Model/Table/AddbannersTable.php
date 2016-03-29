<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class AddbannersTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('addbanners');
        $this->displayField('filename');
        $this->primaryKey('id');
        
    }
}
?>