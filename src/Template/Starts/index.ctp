<?= 
$cell = $this->cell('Menu');
?>
<h1>Startseite</h1>
<?php
if ($starts->isEmpty()) {
    
	echo $this->Html->link('Add New', ['action' => 'add']);
}else{
		
	foreach ($starts as $start): ?>
    
        <?= 
        	$this->Html->link('Bearbeiten', 
        	['action' => 'edit', $start->id]
			) 
        ?>
    
    <div><?= $start->body ?></div>
    <?php endforeach; }?>