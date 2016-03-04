<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ContentsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	
	public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->requirePresence('title')
            ;

        return $validator;
    }
	
	public function isOwnedBy($contendId, $userId)
	{
	    return $this->exists(['id' => $contendId, 'user_id' => $userId]);
	}
}
?>