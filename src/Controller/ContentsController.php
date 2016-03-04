<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class ContentsController extends AppController
{
		
	public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
        
    }
	
	/*
	 * Möglichkeit, auf die Anwendungslogik, die in dieser Methode implementiert ist, 
	 * über den Aufruf von www.example.com/posts/index zuzugreifen. Definieren wir eine Methode namens foobar(), 
	 * so haben User gleichermaßen die Möglichkeit über den Aufruf von www.example.com/posts/foobar 
	 * auf die in dieser Methode enthaltenen Logik zuzugreifen.
	 */
    public function index()
    {
    	//um Daten vom Controller zur View zu übergeben, DB_Tabelle nötig
        $this->set('contents', $this->Contents->find('all'));
    }
	
	public function add()
    {
    	//Eintrag in DB erstellen
    	$contents = $this->Contents->newEntity();
        if ($this->request->is('post')) {
            $contents = $this->Contents->patchEntity($contents, $this->request->data);
			//Authentifizierung
			//$contents->user_id = $this->Auth->user('id');
            if ($this->Contents->save($contents)) {
            	
				//Datei mit Inhalt erstellen
	    		$filename = $this->request->data['title'];
				$filcontent = $this->request->data['txtEditor'];
				$file = new File("myhomepage/contents/$filename".".php", true, 0644);
				$file->write("$filcontent");
				$file->close();
				
				//Flash: CakeHelper Benachrichtigung
                $this->Flash->success(__('Seite erstellt'));
                return $this->redirect(['action' => 'index']); 
            }
            $this->Flash->error(__('Unable to add your content.'));
        }
        $this->set('content', $contents);
    }
	
	public function delete($id,$title){
				
		$this->request->allowMethod(['post', 'delete']);		
		
		//Datei löschen
		$file = new File($title.".php");
		if($file->delete()){
		   $this->Flash->success(__("Seite $title gelöscht"));
		}else{
		  $this->Flash->success(__('Fehler beim löschen von:', h($title)));
		}
		
		//In DB löschen
		$content = $this->Contents->get($id);
	    if ($this->Contents->delete($content)) {	    	
	        return $this->redirect(['action' => 'index']);
	    }
	}
	
	public function edit($id = null, $title){
		//File Stuff
		$file = new File($title.".php");
		$page = $file->read();
		$this->set('body',$page);
					
		//DB stuff
	    $content = $this->Contents->get($id);
	    if ($this->request->is(['post', 'put'])) {
	        $this->Contents->patchEntity($content, $this->request->data);
	        if ($this->Contents->save($content)) {
	        		
	        	//fileStuff
	        	//Old
	        	$file->delete("$pfad$file");
	        	//New
	        	$filename = $this->request->data['title'];
	        	$file = new File($pfad.$filename.".php");
	    		$filcontent = $this->request->data['txtEditor'];
				$file->write("$filcontent");
				$file->close();
				
	            $this->Flash->success(__('Your article has been updated.'));
	            return $this->redirect(['action' => 'index']);
	        }
	        $this->Flash->error(__('Unable to update your article.'));
	    }
	
	    $this->set('content', $content);
	}
	
	public function isAuthorized($user)
	{
	    // All registered users can add articles
	    if ($this->request->action === 'add') {
	        return true;
	    }
	
	    // The owner of an article can edit and delete it
	    if (in_array($this->request->action, ['edit', 'delete'])) {
	        $contendId = (int)$this->request->params['pass'][0];
	        if ($this->Contents->isOwnedBy($contendId, $user['id'])) {
	            return true;
	        }
	    }
	
	    return parent::isAuthorized($user);
	}
}