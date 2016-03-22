<?php
namespace App\Controller;
use App\Controller\AppController;

/*
 * PagesController 
 * 
 * @author Markus Krauss
 * */
class PagesController extends AppController
{
		
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
		$this->loadModel("Contents");
    }
	
    public function index()
    {
        $this->set('contents', $this->Contents->find('all'));
    }
	
	public function display($id = null)
    {
        $content = $this->Contents->get($id);
        $this->set(compact('content'));
    }
}