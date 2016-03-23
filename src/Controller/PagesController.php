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
		$this->loadModel("Starts");
		$this->loadModel("Footers");
		$this->viewBuilder()->layout('page');
    }
	
	
	
    public function index()
    {
        $this->set('contents', $this->Contents->find('all'));
		
		$addbanner = $this->Addbanners->get(0);
        $this->set('addbanner', $addbanner);
		
		$start = $this->Starts->get(1);
        $this->set('start', $start);
		
		$footer = $this->Footers->get(1);
        $this->set('footer', $footer);
    }
	
	public function display($id = null)
    {
        $content = $this->Contents->get($id);
        $this->set(compact('content'));
		
		$addbanner = $this->Addbanners->get(0);
        $this->set('addbanner', $addbanner);
		
		$footer = $this->Footers->get(1);
        $this->set('footer', $footer);
    }
}