<h2>Viewing #<?php echo $user->id; ?></h2>

<p>
	<strong>Id user:</strong>
	<?php echo $user->id_user; ?></p>
<p>
	<strong>Url foto:</strong>
	<?php echo $user->url_foto; ?></p>
<p>
	<strong>Email user:</strong>
	<?php echo $user->email_user; ?></p>
<p>
	<strong>Password user:</strong>
	<?php echo $user->password_user; ?></p>

<?php echo Html::anchor('user/edit/'.$user->id, 'Edit'); ?> |
<?php echo Html::anchor('user', 'Back'); ?>