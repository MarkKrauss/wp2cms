<?= 
$cell = $this->cell('Menu');
?>
<h1>Footer</h1>
<?php
if ($footers->isEmpty()) {
    
	echo $this->Html->link('Add New', ['action' => 'add']);
}else{
		
	foreach ($footers as $footer): ?>
    
        <?= 
        	$this->Html->link('Bearbeiten', 
        	['action' => 'edit', $footer->id]
			) 
        ?>
    
    <div><?= $footer->body ?></div>
    <?php endforeach; }?>