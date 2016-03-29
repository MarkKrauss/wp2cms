<?php
$cakeDescription = 'MyHomepage';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?php $css=$template->name;?>
	<?= $this->Html->css('pagebase') ?>
	<?= $this->Html->css('editorfonts') ?>
		<?= $this->Html->css('cssadd') ?>
	<?= $this->Html->css($css) ?>
	<?= $this->fetch('meta') ?>
    
</head>
   <a href="" class="rechtsbuendig"> <?php  echo $this->Html->link('Zurück zum Editor', 'Homes') ?></a>
<body>
	<?= $this->Flash->render() ?>
    <section class="container clearfix">
        <?= $this->fetch('content') ?>
        
    </section>
    <footer>
 
    </footer>
</body>
</html>
