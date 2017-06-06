<!-- <h2>New <span class='muted'>Amigosecreto</span></h2>
<br> -->

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
			<h1>Criar amigo secreto</h1>

				<?php 
				echo render('amigosecreto/_form'); 
				?>
				<p><?php echo Html::anchor('user/index', 'Voltar'); ?></p>
		</div>
	</div>
</div>