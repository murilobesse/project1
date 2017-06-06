<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Descricao', 'descricao', array('class'=>'control-label')); ?>

				<?php echo Form::input('descricao', Input::post('descricao', isset($amigosecreto) ? $amigosecreto->descricao : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Descricao')); ?>

		</div>
		<?php echo Form::input('iduserowner', Input::post('iduserowner', $_SESSION['userId']), array('class' => 'form', 'type'=>'hidden')); ?>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Salvar', array('class' => 'btn btn-info')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>