<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/*
 * AddbannersController 
 * 
 * @author Markus Krauss
 * */
class AddbannersController extends AppController
{
		
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }
}