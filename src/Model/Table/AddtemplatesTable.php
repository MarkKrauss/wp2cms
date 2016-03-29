<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class AddtemplatesTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('addtemplates');
        $this->displayField('name');
        $this->primaryKey('id');        
    }
}
?>