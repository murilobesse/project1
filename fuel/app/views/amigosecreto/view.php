<!--<h2>Viewing <span class='muted'>#<?php echo $amigosecreto->id; ?></span></h2>

<p>
	<strong>Descricao:</strong>
	<?php //echo $amigosecreto->descricao; ?></p>

<?php echo Html::anchor('amigosecreto/edit/'.$amigosecreto->id, 'Edit'); ?> |
<?php echo Html::anchor('amigosecreto', 'Back'); ?>
-->
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
						<h2><?php echo $amigosecreto->descricao; ?></h2>
						<h5>Sorteio realizado: <?php echo ($amigosecreto->sorteado) ? 'Sim' : 'Não' ?></h5>
						
						<b>Participantes</b>
						<?php echo "<table class='table table-bordered'>";
							echo "<tr><th>Nome</th><th>Sobrenome</th><th>E-Mail</th></tr>";
							$_SESSION["amigoSecretoId"] = $amigosecreto->id;
							foreach ($amigosecreto->users as $amigo)
							{
								echo '<td><text class="text-muted"><b>' . $amigo['name'] .'</b></td>'; 
								echo '<td><text class="text-muted"><b>' . $amigo['lastname'] .'</b></td>';
								echo '<td><text class="text-muted"><b>' . $amigo['email'].'</b></td>';
								if ($amigosecreto->iduserowner == $_SESSION['userId']) {echo '<td>'.Html::anchor('amigosecreto/deleteParticipante/'.$amigo['id'], '<i class="icon-trash icon-white"></i> Excluir', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Remover participante?')")).'</td>';}
								echo '</tr>';
							}
							echo '</table>';
						
						if ($amigosecreto->iduserowner == $_SESSION['userId'] and (!$amigosecreto->sorteado)) 
						{
							echo "<a href='../adicionarParticipantes/" . $_SESSION['amigoSecretoId'] ."' class='btn btn-success'>Adicionar Participantes</a>";
							echo "<a href='../sorteio/" . $amigosecreto->id . "' class='btn btn-primary'>Sortear</a>";	
						}
						?>
						<a href="../../user/meusAmigosSecretos/<?php echo $_SESSION['userId']?>" class="btn btn-warning">Voltar</a>
				</div>
			</div>
		</div>
	<?php include "includes/footer.php"; ?>	
</body>
