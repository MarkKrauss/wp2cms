<?php
namespace App\Controller;
use App\Controller\AppController;

/*
 * FootersController 
 * 
 * @author Markus Krauss
 * */
class FootersController extends AppController
{
		
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent        
    }
	
    public function index()
    {
        $this->set('footers', $this->Footers->find('all'));
    }
	
	public function add()
    {
    	$footer = $this->Footers->newEntity();
        if ($this->request->is('post')) {
            $footer = $this->Footers->patchEntity($footer, $this->request->data);
            if ($this->Footers->save($footer)) {
                $this->Flash->success(__('Seite erstellt'));
                return $this->redirect(['action' => 'index']); 
            }
            $this->Flash->error(__('Unable to add your content.'));
        }
        $this->set('footer', $footer);
    }
	
	/*
	public function delete($id,$title){				
		$this->request->allowMethod(['post', 'delete']);		
		$footer = $this->Footers->get($id);
	    if ($this->Footers->delete($footer)) {
	    	$this->Flash->success(__("Seite $title gelöscht"));	    	
	        return $this->redirect(['action' => 'index']);
	    }else{
	    	$this->Flash->success(__('Fehler beim löschen von:', h($title)));
	    }
	}
	*/
	
	public function edit($id = null){
	    $footer = $this->Footers->get($id);		 
	    if ($this->request->is(['post', 'put'])) {
	        $this->Footers->patchEntity($footer, $this->request->data);
	        if ($this->Footers->save($footer)) {	        	
	            $this->Flash->success(__('Your article has been updated.'));
	            return $this->redirect(['action' => 'index']);
	        }
	        $this->Flash->error(__('Unable to update your article.'));
	    }	
	    $this->set('footer', $footer);
	}
	
}