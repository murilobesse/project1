<body class="index-page">
	<nav class="navbar navbar-info navbar-info navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div>

			<div class="collapse navbar-collapse" id="navigation-index">
				<ul class="nav navbar-nav navbar-left hidden-xs">
					<li>
						<a href="#" target="" style="font-size: large;">
							<b>Amigo X</b>
						</a>
					</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#" target="" class="hidden-xs">
							 Bem vindo <?php echo $_SESSION["userName"]; ?>
						</a>
					</li>
					<li>
						<a href="../../logout" target="">
							<i class="material-icons"></i> Sair
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
		<div class="main main-raised" style="margin-top: 75px;">
			<div class="container">
				<div class="section text-center section-basic">	
					<h2>Nova Mensagem</h2>
					<div class="content">
						<div class="form-group">
							<label style="color: black">Enviar mensagem para: <b><?php echo $users->name. ' ' . $users->lastname;; ?></b></label>
						</div>
							<?php echo Form::open(array("class"=>"form")); 
								
									echo Form::input ('idusersend', Input::post('idusersend', $_SESSION['userId']), array('class' => 'form', 'type'=>'hidden'));
									echo Form::input ('iduserreceived', Input::post('iduserreceived', $users->id), array('class' => 'form', 'type'=>'hidden'));
									echo Form::input ('read', Input::post('read', 'false'), array('class' => 'form', 'type'=>'hidden'));
									echo Form::input ('data', Input::post('data', date('Y-m-d')), array('class' => 'form', 'type'=>'hidden')); 
								?>
								<div class="form-group">
									<?php echo Form::label('Mensagem', 'mensagem', array('class'=>'control-label')); ?>
									<?php echo Form::textarea ('mensagem', Input::post('mensagem', isset($mensagen) ? $mensagen->mensagem : ''), array('class' => 'form-control', 'placeholder'=>'Mensagem')); ?>
								</div>
								
								<div class="form-group">
									<label class='control-label'>&nbsp;</label>
									<?php echo Form::submit('submit', 'Enviar', array('class' => 'btn btn-success')); ?>
									<a href="../../user/minhasMensagens" class="btn btn-warning">Voltar</a>
								</div>
								

							<?php echo Form::close(); ?>
					</div>
				</div>
			</div>
		</div>
<body>