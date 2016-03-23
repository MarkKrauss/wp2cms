<h1>Banner benutzen</h1>
<?php

	echo  $this->Html->image($name);

    echo $this->Form->create('SetTemplate');
	echo $this->Form->input('id',['value' => 0,'type' => 'hidden']);
    echo $this->Form->input('name', ['value' => $name,'type' => 'hidden']);
    echo $this->Form->button(__('Dieses Template verwenden'));
    echo $this->Form->end();
	
	echo $this->Html->link(
	    'Abbruch',
	    '/banners/',
	    ['class' => 'button']
	);	
?>