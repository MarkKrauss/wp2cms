<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/*
 * HomesController 
 * 
 * @author Markus Krauss
 * */
class HomesController extends AppController
{
		
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent        
    }
	
	public function index()
    {
        $this->set('homes', $this->Homes->find('all'));
    }
}