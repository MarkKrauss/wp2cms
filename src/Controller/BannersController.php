<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use App\Model\Validation\UploadValidator;
use Cake\ORM\TableRegistry;

/*
 * BannersController 
 * 
 * @author Markus Krauss
 * */
class BannersController extends AppController
{
		
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
        //$this->addBehavior('Upload');
    }
	
	public function index()
    {
        $this->set('banners', $this->Banners->find('all'));
    }
	
	/**
	 * View method
	 *
	 * @param string|null $id Content id.
	 * @return void
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function view($id = null)
	{
	    $content = $this->Contents->get($id, [
	        'contain' => ['Courses']
	    ]);
	    $this->set('content', $content);
	    $this->set('_serialize', ['content']);
	}
	

	/**
	 * Add method
	 *
	 * @return void Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$banner = $this->Banners->newEntity($this->request->data);
		
		$validator = new UploadValidator();
		$errors = $validator->errors($this->request->data());
		if (empty($errors)) {
		    if ($this->request->is('post')) {
		        $banner = $this->Banners->patchEntity($banner, $this->request->data);
					
		        if ($this->Banners->save($banner)) {
		        	$newname = $this->request->data['filename'];
					$file = $this->request->data['upload'];
		        	$this->uploadFiles("upload", $newname);		        
					//$this->uploadFile($file);//Behaviour
		            
		            $this->Flash->success("The content $newname has been saved.");
		            return $this->redirect(['action' => 'index']);
		        } else {
		            $this->Flash->error('The content could not be saved. Please, try again.');
		        }
		    }
		    $this->set('banner', $banner);
		}else{
			$this->Flash->error("Wählen Sie zuerst ein Bild aus");
		}
	}

	public function edit($id = null, $filename){
		
		$f=$filename;
		$this->set('filename', $f);
		
		//Andere Tableverbindung nehmen
		$this->loadModel('Addbanners');
		
		$banner=$this->Addbanners->newEntity();
		
		if ($this->request->is(['post'])) {
	    	$banner=$this->Addbanners->patchEntity($banner, $this->request->data);
	    								//
	    	if ($this->Addbanners->save($banner)) {
				$this->Flash->success(__('Banner wurde aktualisiert.'));
				return $this->redirect(['action' => 'index']);				
			}
			$this->Flash->error(__('Ein Fehler ist aufgetreten.'));
	    }	    
	}
}