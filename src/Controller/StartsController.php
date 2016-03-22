<?php
namespace App\Controller;
use App\Controller\AppController;

/*
 * FootersController 
 * 
 * @author Markus Krauss
 * */
class StartsController extends AppController
{

	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');        
    }
	
    public function index()
    {
        $this->set('starts', $this->Starts->find('all'));
    }
	
	public function add()
    {
    	$start = $this->Starts->newEntity();
        if ($this->request->is('post')) {
            $start = $this->Starts->patchEntity($start, $this->request->data);
            if ($this->Starts->save($start)) {
                $this->Flash->success(__('Seite erstellt'));
                return $this->redirect(['action' => 'index']); 
            }
            $this->Flash->error(__('Unable to add your content.'));
        }
        $this->set('start', $start);
    }

	public function edit($id = null){
	    $start = $this->Starts->get($id);		 
	    if ($this->request->is(['post', 'put'])) {
	        $this->Starts->patchEntity($start, $this->request->data);
	        if ($this->Starts->save($start)) {	        	
	            $this->Flash->success(__('Your article has been updated.'));
	            return $this->redirect(['action' => 'index']);
	        }
	        $this->Flash->error(__('Unable to update your article.'));
	    }	
	    $this->set('start', $start);
	}
	
}