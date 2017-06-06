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
						<a href="../logout" target="">
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
				<h1>Início</h1>

				<div class="row">
					<div class="col-md-6">
						<div class="info card">
							<div class="icon icon-primary">
								<i class="material-icons">card_giftcard</i>
							</div>
							<h2><a href="../user/meusAmigosSecretos/<?php echo $_SESSION["userId"]; ?>" class="btn btn-primary">Visualizar Amigos Secretos</a></h2>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="info card">
							<div class="icon icon-danger">
								<i class="material-icons">add_box</i>
							</div>
							<h2><a href="../amigosecreto/create" class="btn btn-danger">Criar Amigo Secreto</a></h2>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<div class="info card">
							<div class="icon icon-success">
								<i class="material-icons">message</i>
							</div>
							<h2><a href="minhasMensagens" class="btn btn-success">Mensagens</a></h2>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="info card">
							<div class="icon icon-warning">
								<i class="material-icons">face</i>
							</div>
							<h2><a href="edit/<?php echo $_SESSION["userId"]; ?>" class="btn btn-warning">Minhas Informações</a></h2>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<?php include "includes/footer.php" ?>
</body>