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
					<h2>Minhas Mensagens</h2>
						<?php  
							echo "<table class='table table-bordered'><tr>";
							echo "<th>Descrição</th><th>Enviado Por</th><th>Em</th><th>Lido</th><th>Ação</th>";
							echo "</tr>";
							foreach ($mensagens as $msg)
							{
								echo '<tr>';
								echo '<td><text class="text-muted">'. substr($msg->mensagem, 0, 80); 
								if (strlen($msg->mensagem) > 80) { echo' ...';}
								echo '</td>'; 
								if ($msg->idusersend == -1)
								{
									echo '<td><text class="text-muted">Amigo X</td>';
								}
								else
								{
									echo '<td><text class="text-muted">'. $msg->users->name. ' ' .$msg->users->lastname .'</td>';
								}
								echo '<td><text class="text-muted">'. substr($msg->data, 0, 10).'</td>'; 
								echo '<td><text class="text-muted">';
								echo ($msg->read == 'true') ? 'Sim' : 'Não'; 
								echo '</td>';
								echo '<td>'.Html::anchor('mensagens/view/' .  $msg->id , '<i class="icon-trash icon-white"></i> Ver mensagem', array('class' => 'btn btn-sm btn-success', ));
								echo Html::anchor('mensagens/delete/'. $msg->id, '<i class="icon-trash icon-white"></i> Excluir', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Excluir mensagem?')"));
								echo '</td>';
								echo '</tr>';
							}
							echo '</table>';
						?>
						<a href="../mensagens/selecionarUsuario" class="btn btn-info">Nova Mensagem</a>
						<a href="../user/index" class="btn btn-warning">Voltar</a>
				</div>
			</div>
		</div>
		
	<?php include "includes/footer.php"; ?>	
</body>
