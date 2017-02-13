<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id items', 'id_items', array('class'=>'control-label')); ?>

				<?php echo Form::input('id_items', Input::post('id_items', isset($item) ? $item->id_items : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id items')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Nombre items', 'nombre_items', array('class'=>'control-label')); ?>

				<?php echo Form::input('nombre_items', Input::post('nombre_items', isset($item) ? $item->nombre_items : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nombre items')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Tinta items', 'tinta_items', array('class'=>'control-label')); ?>

				<?php echo Form::input('tinta_items', Input::post('tinta_items', isset($item) ? $item->tinta_items : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tinta items')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>