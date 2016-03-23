<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use App\Model\Validation\UploadValidator;
use Cake\ORM\TableRegistry;

/*
 * TemplatesController 
 * 
 * @author Markus Krauss
 * */
class TemplatesController extends AppController
{
		
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }
	
	public function index()
    {
        $this->set('templates', $this->Templates->find('all'));
    }


	public function choose($id = null, $name){
		
		$f=$name;
		$this->set('name', $f);
		$this->loadModel('Addtemplates');
		
		$template=$this->Addtemplates->newEntity();
		
		if ($this->request->is(['post'])) {
	    	$template=$this->Addtemplates->patchEntity($template, $this->request->data);
	    								//
	    	if ($this->Addtemplates->save($template)) {
				$this->Flash->success(__('Template wurde aktualisiert.'));
				return $this->redirect(['action' => 'index']);				
			}
			$this->Flash->error(__('Ein Fehler ist aufgetreten.'));
	    }	    
	}
}