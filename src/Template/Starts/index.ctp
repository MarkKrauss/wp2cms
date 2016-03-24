<?= 
$cell = $this->cell('Menu');
?>
<h1>Startseite</h1>
<?php
if ($starts->isEmpty()) {    
	echo $this->Html->link('Hinzufügen', ['action' => 'add'],['class' => 'btn adding']);
}else{
		
	foreach ($starts as $start): ?>
    
        <?= 
        	$this->Html->link('Bearbeiten', 
        	['action' => 'edit', $start->id]
			) 
        ?>
    
    <div><?= $start->body ?></div>
    <?php endforeach; }?>