<?= 
$cell = $this->cell('Menu');
?>
<h1>Anzeige der Templates</h1>

<table>
	<tr>    
		<th>Template</th>
		<th>Auswählen</th>
    </tr>

    <?php foreach ($templates as $template): ?>
    <tr>
        <td>
        	<?= $this->Html->image($template->image, ['alt' => 'template','class'=>'img_tmp']); ?>
        </td>
        <td>
        	<?= 
            	$this->Html->link('Auswählen', 
            	['action' => 'choose', $template->id, $template->name]
				) 
            ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>