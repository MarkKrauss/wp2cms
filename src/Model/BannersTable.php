<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class BannersTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('banners');
        $this->displayField('filename');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Addbanners');
        //$this->addBehavior('Upload');//Verbindung zum Model/Behavior/Upload.php
    }
}
?>