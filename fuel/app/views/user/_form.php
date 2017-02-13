<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id user', 'id_user', array('class'=>'control-label')); ?>

				<?php echo Form::input('id_user', Input::post('id_user', isset($user) ? $user->id_user : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id user')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Url foto', 'url_foto', array('class'=>'control-label')); ?>

				<?php echo Form::input('url_foto', Input::post('url_foto', isset($user) ? $user->url_foto : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Url foto')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email user', 'email_user', array('class'=>'control-label')); ?>

				<?php echo Form::input('email_user', Input::post('email_user', isset($user) ? $user->email_user : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email user')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Password user', 'password_user', array('class'=>'control-label')); ?>

				<?php echo Form::input('password_user', Input::post('password_user', isset($user) ? $user->password_user : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Password user')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>