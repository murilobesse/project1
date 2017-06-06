<body class="signup-page">
	<div class="wrapper">
		<div class="header header-filter" style="background-image: url('../assets/img/signin-bg.png'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<div class="header header-info text-center">
									<h4>Entrar</h4>
								</div>
								<p class="text-divider"></p><br>
								<div class="content">
						
									<?php echo render('user/_formLogin'); ?>
									<p><?php echo Html::anchor('', 'Voltar'); ?></p>
								
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>