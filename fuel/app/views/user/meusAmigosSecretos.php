<!--<h2>Viewing <span class='muted'>#<?php //echo $user->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $user->name; ?></p>
<p>
	<strong>Lastname:</strong>
	<?php //echo $user->lastname; ?></p>
<p>
	<strong>Email:</strong>
	<?php //echo $user->email; ?></p>
<p>
	<strong>Pass:</strong>
	<?php //echo $user->pass; ?></p>
	-->
<body class="index-page">
	<?php include "includes/navLogged.php"; ?>	
		<div class="main main-raised" style="margin-top: 75px;">
			<div class="container">
				<div class="section text-center section-basic">	
					<h2>Meus Amigos Secretos</h2>
						<?php  
							//echo var_dump($user);
							echo "<table class='table table-bordered'>";
							echo "<tr><th>Descrição</th></tr>";
							foreach ($user->amigosecretos as $amigo)
							{
								echo '<td valign="center"><text class="text-muted"><b><br>' . $amigo['descricao'] .'</b></td>'; 
								echo '<td style="width: 100px;"><a href="../../amigosecreto/view/'. $amigo['id'] .'" class="btn btn-success">Visualizar</td></tr>';
							}
							echo '</table>';
							echo '<p>' . Html::anchor('user/index', 'Voltar') . '</p>';
						?>
				</div>
			</div>
		</div>
		
	<?php include "includes/footer.php"; ?>	
	
</body>
