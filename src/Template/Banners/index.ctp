<?= 
$cell = $this->cell('Menu');
?>
<h1>Banner anzeige</h1>
<p><?= $this->Html->link('Add New', ['action' => 'add']) ?></p>
<table>
	<tr>    
		<th>Bild</th>
		<th>Auswählen</th>
    </tr>

    <?php foreach ($banners as $banner): ?>
    <tr>
        <td>
        	<?= $this->Html->image('uploads/'.$banner->filename, ['alt' => 'banner','class'=>'img_tmp']); ?>
        </td>
        <td>
        	<?= 
            	$this->Html->link('Edit', 
            	['action' => 'edit', $banner->id, $banner->filename]
				) 
            ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>