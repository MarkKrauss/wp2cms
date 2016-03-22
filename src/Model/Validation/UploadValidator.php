<?php

namespace App\Model\Validation;

use Cake\Validation\Validator;

class UploadValidator extends Validator {
		
	public function __construct(){
	    parent::__construct();
	
	      $this
	      ->notEmpty('filename');
	}
}