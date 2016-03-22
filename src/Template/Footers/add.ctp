<h1>Add Footer</h1>
<?php
    echo $this->Form->create($footer);
    echo "<div id='wysiwygEditor'></div>";
	echo "<div id='txtEditor' contenteditable='true'></div>";
	echo $this->Form->textarea('body', ['id' => 'body']);
    echo $this->Form->button('Speichern', ['type' => 'submit', 'id'=> 'sendWysiwyg']);
    echo $this->Form->end();
?>