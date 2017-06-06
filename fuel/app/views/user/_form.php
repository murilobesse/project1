<?php echo Form::open(array("class"=>"form")); ?>

		<div class="input-group">
			<span class="input-group-addon"><i class="material-icons">face</i></span>
			<?php echo Form::input('name', Input::post('name', isset($user) ? $user->name : ''), array('class' => 'form-control', 'placeholder'=>'Name')); ?>
		</div>
		<div class="input-group floating-label">
			<span class="input-group-addon"><i class="material-icons">a</i></span>
			<?php echo Form::input('lastname', Input::post('lastname', isset($user) ? $user->lastname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lastname')); ?>
		</div>
		<div class="input-group floating-label">
			<span class="input-group-addon"><i class="material-icons">email</i></span>
			<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>
		</div>
		<div class="input-group floating-label">
			<span class="input-group-addon"><i class="material-icons">lock_outline</i></span>
			<?php echo Form::input('pass', Input::post('pass', isset($user) ? $user->pass : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pass')); ?>
		</div>
		<div class="footer text-center">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Cadastrar/Salvar', array('class' => 'btn btn-info')); ?>		
		</div>
			
<?php echo Form::close(); ?>