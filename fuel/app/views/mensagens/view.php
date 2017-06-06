	<?php include "includes/navLogged.php"; ?>	
		<div class="main main-raised" style="margin-top: 75px;">
			<div class="container">
				<div class="section text section-basic">	
					<h2>Meus Amigos Secretos</h2>

						<p>
							<strong>Mensagem:</strong>
							<?php echo $mensagen->mensagem; ?></p>
						<p>
							<strong>Enviado Por:</strong>
							<?php //echo $mensagen->users->name; 
							if ($mensagen->idusersend == -1)
							{
								echo 'Amigo X';
							}
							else
							{
								echo $mensagen->users->name. ' ' .$mensagen->users->lastname;
							}
							?></p>
						<p>
							<strong>Em:</strong>
							<?php echo substr($mensagen->data, 0, 10); ?></p>

						<a href="../delete/<?php echo $mensagen->id; ?>" class="btn btn-danger" onclick="return confirm('Excluir mensagem?')">Excluir</a> 
						<a href="../../user/minhasMensagens" class="btn btn-warning">Voltar</a>
				</div>
			</div>
		</div>