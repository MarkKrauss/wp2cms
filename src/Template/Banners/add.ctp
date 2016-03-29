<h1>Banner hinzufügen</h1>
<p>Hinweis: Das Bild sollte min. 940px breit sein</p>
<?php
	echo $this->Form->create('Banners', ['type' => 'file']);
	echo $this->Form->input('filename');
	echo $this->Form->file('upload', array('type' => 'file', 'label' => 'Datei', 'id'=>'upload'));
	echo "</br></br>";
	echo $this->Form->button(__('Submit'));	
	echo $this->Form->end();
?>


