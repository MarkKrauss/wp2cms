	<div id="banner">
		<?php echo $this->Html->image('uploads/'.$addbanner->filename, ['alt' => 'Ein Banner']);?>
	</div>
	<?php foreach ($contents as $content): ?>
    
    	<?= $this->Html->link($content->title, ['action' => 'display', $content->id]) ?>
    	
    <?php endforeach; ?>
