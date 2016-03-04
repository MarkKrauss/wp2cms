<h1>Add Article</h1>
<?php
    echo $this->Form->create($content);//simuliert ein <form>
    echo $this->Form->input('title');
   echo "<div id='wysiwygEditor'></div>";
    echo $this->Form->button('Speichern', ['type' => 'submit']);
    echo $this->Form->end();//absenden Button
?>