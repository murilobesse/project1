<h2>Editing <span class='muted'>Mensagen</span></h2>
<br>

<?php echo render('mensagens/_form'); ?>
<p>
	<?php echo Html::anchor('mensagens/view/'.$mensagen->id, 'View'); ?> |
	<?php echo Html::anchor('mensagens', 'Back'); ?></p>
