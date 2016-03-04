<?= 
$cell = $this->cell('Menu');
?>
<h1>Seiten anzeige</h1>
<p><?= $this->Html->link('Add New', ['action' => 'add']) ?></p>
<table>
	<tr>    
		<th>ID</th>
        <th>Seite</th>    
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $articles query object, printing out article info -->

    <?php foreach ($contents as $content): ?>
    <tr>
        <td><?= $content->id ?></td>
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
            	$this->Html->link('Edit', 
            	['action' => 'edit', $content->id, $content->title]
				) 
            ?>
            
        </td>
        
    </tr>
    <?php endforeach; ?>

</table>