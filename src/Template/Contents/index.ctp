<?= 
$cell = $this->cell('Menu');
?>
<h1>Anzeige der Seiten</h1>
<p>Hier können Sie die Unterseiten Ihrer Homepage generieren. Diese sind auf der fertigen Homepage über das Menü zu erreichen.</p>
<br/>
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
            <?= $content->title ?>
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