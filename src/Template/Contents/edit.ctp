<h1>Bearbeiten</h1>
<?php
    echo $this->Form->create($content);
    echo $this->Form->input('title');
	echo "<div id='wysiwygEditor'></div>	
		<div id='txtEditor' contenteditable='true'>$content->body</div>";	
	echo $this->Form->textarea('body', ['id' => 'body']);
    echo $this->Form->button('Speichern', ['type' => 'submit', 'id'=> 'sendWysiwyg']);
    echo $this->Form->end();
?>