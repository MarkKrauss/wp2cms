	<div id="pagebanner">
		<?php echo $this->Html->image('uploads/'.$addbanner->filename, ['alt' => 'Ein Banner']);?>
	</div>
	<div id="pagenavi">
		<?php foreach ($contents as $content): ?>    
	    	<?= $this->Html->link($content->title, ['action' => 'display', $content->id]) ?>    	
	    <?php endforeach; ?>
    </div>
	<div id="pagebody">
		<?= $start->body ?>
	</div>
	<div id="pagefooter">
		<?= $footer->body ?>
	</div>
	