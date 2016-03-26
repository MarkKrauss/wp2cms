<?= 
$cell = $this->cell('Menu');
?>
<h1>Anzeige der Seiten</h1>
<p><?= $this->Html->link('Hinzufügen', ['action' => 'add'],['class' => 'btn adding']) ?></p>
<table>
	<tr>    
		<th>Seite</th>    
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $articles query object, printing out article info -->

    <?php foreach ($contents as $content): ?>
    <tr>
        <td>
            <?= $this->Html->link($content->title, ['action' => 'view', $content->id]) ?>
        </td>
        
        <td>
            <?= 
            	$this->Form->postLink(
                'Delete',
                ['action' => 'delete', $content->id,$content->title ],
                ['confirm' => 'Are you sure?'])
            ?>
            
            <?= 
            	$this->Html->link('Auswählen', 
            	['action' => 'edit', $content->id, $content->title]
				) 
            ?>
            
        </td>
        
    </tr>
    <?php endforeach; ?>

</table>