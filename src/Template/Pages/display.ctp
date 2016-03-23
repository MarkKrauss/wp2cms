<div id="pagebanner">
	<?php echo $this->Html->image('uploads/'.$addbanner->filename, ['alt' => 'Ein Banner']);?>
</div>
<div id="pageheadline">
	<h1><?= h($content->title) ?></h1>	
</div>
<div id="pagebody"><?= $content->body ?></div>
<div id="pagefooter">
	<?= $footer->body ?>
</div>