
	<?php foreach ($contents as $content): ?>
    
    	<?= $this->Html->link($content->title, ['action' => 'display', $content->id]) ?>
    	
    <?php endforeach; ?>
