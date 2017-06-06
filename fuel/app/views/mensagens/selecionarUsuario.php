<!--<h2>Viewing <span class='muted'>#<?php //echo $amigosecreto->id; ?></span></h2>

<p>
	<strong>Descricao:</strong>
	<?php //echo $amigosecreto->descricao; ?></p>

<?php //echo Html::anchor('amigosecreto/edit/'.$amigosecreto->id, 'Edit'); ?> |
<?php //echo Html::anchor('amigosecreto', 'Back'); ?>
-->
<body class="index-page">
	<?php include "includes/navLogged.php"; ?>	
		<div class="main main-raised" style="margin-top: 75px;">
			<div class="container">
				<div class="section text-center section-basic">	
						<h2><?php echo 'Selecionar Usuário'; ?></h2>
						<h5>Selecione o usuário que deseja enviar uma mensagem.</h5>
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
							{
								echo '<td><text class="text-muted"><b>' . $user['name'] .'</b></td>'; 
								echo '<td><text class="text-muted"><b>' . $user['lastname'] .'</b></td>';
								echo '<td><text class="text-muted"><b>' . $user['email'] .'</b></td>';
								echo '<td>'.Html::anchor('mensagens/create/'.$user['id'], '<i class="icon-trash icon-white"></i> Selecionar', array('class' => 'btn btn-sm btn-success')).'</td>';
								echo '</tr>';
							}
							echo '</table>';
						?>
						<a href="../user/minhasMensagens" class="btn btn-info">Voltar</a>
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
	
