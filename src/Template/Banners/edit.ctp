<h1>Banner benutzen</h1>
<?php

	echo  $this->Html->image('uploads/'.$filename); 

    echo $this->Form->create('SetBanner');
	echo $this->Form->input('id',['value' => 0,'type' => 'hidden']);
    echo $this->Form->input('filename', ['value' => $filename,'type' => 'hidden']);
	echo $this->Form->button(__('Diesen Banner verwenden'));
    echo $this->Form->end();
	
	echo $this->Html->link(
	    'Abbruch',
	    '/Banners',
	    ['class' => 'button']
	);	
?>