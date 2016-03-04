<h1>Bearbeiten</h1>
<?php
    echo $this->Form->create($content);
    echo $this->Form->input('title');
    //echo $this->Form->input('body');
    echo "<div id='wysiwygEditor' name='body'>".$body."</div>";
    echo $this->Form->button('Speichern', ['type' => 'submit']);
    echo $this->Form->end();

?>