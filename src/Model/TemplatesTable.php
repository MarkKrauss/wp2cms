<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TemplatesTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('templates');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Addtemplates');
    }
}
?>