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
		$this->loadModel("Addbanners");
		 $this->viewBuilder()->layout('page');
    }
	
	
	
    public function index()
    {
        $this->set('contents', $this->Contents->find('all'));
		$this->set('addbanners', $this->Addbanners->find('all'));
		
		$addbanner = $this->Addbanners->get(0);
        $this->set('addbanner', $addbanner);
    }
	
	public function display($id = null)
    {
        $content = $this->Contents->get($id);
        $this->set(compact('content'));
		
		
    }
}