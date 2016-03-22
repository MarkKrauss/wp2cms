<h1>Add Banner</h1>

<?php
	echo $this->Form->create('Banners', ['type' => 'file']);
	echo $this->Form->input('filename');
	echo $this->Form->file('upload', array('type' => 'file', 'label' => 'Datei', 'id'=>'upload'));
	echo "</br></br>";
	echo $this->Form->button(__('Submit'));	
	echo $this->Form->end();
?>


