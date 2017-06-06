<?php echo Form::open(array("class"=>"form")); ?>

		<div class="form-group">
			<?php echo Form::label('Mensagem', 'mensagem', array('class'=>'control-label')); ?>
			<?php echo Form::textarea ('mensagem', Input::post('mensagem', isset($mensagen) ? $mensagen->mensagem : ''), array('class' => 'form-control', 'placeholder'=>'Mensagem')); ?>
		</div>
		<?php echo Form::input ('idusersend', Input::post('idusersend', $_SESSION['userId']), array('class' => 'form-control')); ?>
		<?php echo Form::input ('idusersend', Input::post('idusersend', $users->id), array('class' => 'form-control')); ?>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Enviar', array('class' => 'btn btn-success')); ?>		
		</div>

<?php echo Form::close(); ?>