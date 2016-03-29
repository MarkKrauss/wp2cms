<?= 
$cell = $this->cell('Menu');
?>
<h1>Vorschau des Footers</h1>
<br/>
<?php
if ($footers->isEmpty()) {
    echo $this->Html->link('Hinzufügen', ['action' => 'add'],['class' => 'btn adding']);
}else{
		
	foreach ($footers as $footer): ?>
    
        <?= 
        	$this->Html->link('Bearbeiten', 
        	['action' => 'edit', $footer->id]
			) 
        ?>
    
    <div id="rcorners"><?= $footer->body ?></div>
    <?php endforeach; }?>