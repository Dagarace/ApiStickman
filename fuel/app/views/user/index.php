<h2>Listing Users</h2>
<br>
<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id user</th>
			<th>Url foto</th>
			<th>Email user</th>
			<th>Password user</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $item): ?>		<tr>

			<td><?php echo $item->id_user; ?></td>
			<td><?php echo $item->url_foto; ?></td>
			<td><?php echo $item->email_user; ?></td>
			<td><?php echo $item->password_user; ?></td>
			<td>
				<?php echo Html::anchor('user/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('user/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('user/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('user/create', 'Add new User', array('class' => 'btn btn-success')); ?>

</p>
