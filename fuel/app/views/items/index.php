<h2>Listing Items</h2>
<br>
<?php if ($items): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id items</th>
			<th>Nombre items</th>
			<th>Tinta items</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($items as $item): ?>		<tr>

			<td><?php echo $item->id_items; ?></td>
			<td><?php echo $item->nombre_items; ?></td>
			<td><?php echo $item->tinta_items; ?></td>
			<td>
				<?php echo Html::anchor('items/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('items/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('items/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Items.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('items/create', 'Add new Item', array('class' => 'btn btn-success')); ?>

</p>
