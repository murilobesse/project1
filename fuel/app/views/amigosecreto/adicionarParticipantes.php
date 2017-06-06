<!--<h2>Viewing <span class='muted'>#<?php //echo $amigosecreto->id; ?></span></h2>

<p>
	<strong>Descricao:</strong>
	<?php //echo $amigosecreto->descricao; ?></p>

<?php //echo Html::anchor('amigosecreto/edit/'.$amigosecreto->id, 'Edit'); ?> |
<?php //echo Html::anchor('amigosecreto', 'Back'); ?>
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
						<h2><?php echo 'Adicionar Participantes'; ?></h2>

						<b><?php echo $amigosecreto->descricao; ?></b><br>
						<div class="row">
							<div class="col-sm-4">
								<input type="text" id="pesquisarNome" class="form-control" onkeyup="searchName()" placeholder="Pesquisar por nome.." >
							</div>
							<div class="col-sm-4">
								<input type="text" id="pesquisarSobrenome" class="form-control" onkeyup="searchLastname()" placeholder="Pesquisar por sobrenome.." >
							</div>
							<div class="col-sm-4">
								<input type="text" id="pesquisarEmail" class="form-control" onkeyup="searchEmail()" placeholder="Pesquisar por e-mail.." >
							</div>
						</div>
						<?php echo "<table class='table table-bordered' id='tableParticipante'>";
							echo "<tr class='header'>
									<th>Nome</th>
									<th>Sobrenome</th>
									<th>E-Mail</th>
									<th> </th>
								</tr>";
							foreach ($users as $user)
							//foreach ($amigosecreto->users as $user)
							{
								if (!array_key_exists($user['id'], $amigosecreto->users))
								{
									echo '<td><text class="text-muted"><b>' . $user['name'] .'</b></td>'; 
									echo '<td><text class="text-muted"><b>' . $user['lastname'] .'</b></td>';
									echo '<td><text class="text-muted"><b>' . $user['email'] .'</b></td>';
									echo '<td>'.Html::anchor('amigosecreto/addParticipante/'.$user['id'], '<i class="icon-trash icon-white"></i> Adicionar', array('class' => 'btn btn-sm btn-success', 'onclick' => "return confirm('Adicionar participante?')")).'</td>';
									echo '</tr>';
								} 
							}
							echo '</table>';
							

						?>
						<a href="../view/<?php echo $amigosecreto->id;?>" class="btn btn-info">Voltar</a>
				</div>
			</div>
		</div>
	<?php include "includes/footer.php"; ?>	
</body>
<script>
function searchName() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("pesquisarNome");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableParticipante");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function searchLastname() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("pesquisarSobrenome");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableParticipante");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function searchEmail() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("pesquisarEmail");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableParticipante");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
	
