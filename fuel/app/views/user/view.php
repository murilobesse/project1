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
							echo "<table class='table table-bordered'><tr>";
							foreach ($user->amigosecretos as $amigo)
							{
								echo '<td><a class="btn btn-simple btn-muted">' . $amigo['descricao'] .'</td>'; 
								echo '<td style="width: 100px;"><a class="btn btn-success">Visualizar participantes</td></tr>';
							}
							echo '</table>';
						?>
				</div>
			</div>
		</div>
		
	<?php include "includes/footer.php"; ?>	
</body>