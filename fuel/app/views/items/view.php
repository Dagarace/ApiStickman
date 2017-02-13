<h2>Viewing #<?php echo $item->id; ?></h2>

<p>
	<strong>Id items:</strong>
	<?php echo $item->id_items; ?></p>
<p>
	<strong>Nombre items:</strong>
	<?php echo $item->nombre_items; ?></p>
<p>
	<strong>Tinta items:</strong>
	<?php echo $item->tinta_items; ?></p>

<?php echo Html::anchor('items/edit/'.$item->id, 'Edit'); ?> |
<?php echo Html::anchor('items', 'Back'); ?>