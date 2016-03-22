<h1>Gestalte die Startseite</h1>
<?php
    echo $this->Form->create($start);
    echo "<div id='wysiwygEditor'></div>";
	echo "<div id='txtEditor' contenteditable='true'></div>";
	echo $this->Form->textarea('body', ['id' => 'body']);
    echo $this->Form->button('Speichern', ['type' => 'submit', 'id'=> 'sendWysiwyg']);
    echo $this->Form->end();
?>