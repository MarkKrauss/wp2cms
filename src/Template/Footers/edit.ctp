<h1>Bearbeiten</h1>
<?php
    echo $this->Form->create($footer);
	echo "<div id='wysiwygEditor'></div>	
		  <div id='txtEditor' contenteditable='true'>$footer->body</div>";	
	echo $this->Form->textarea('body', ['id' => 'body']);
    echo $this->Form->button('Speichern', ['type' => 'submit', 'id'=> 'sendWysiwyg']);
    echo $this->Form->end();
?>