<h2>Viewing <span class='muted'>#<?php echo $amigosecreto->id; ?></span></h2>

<p>
	<strong>Descricao:</strong>
	<?php echo $amigosecreto->descricao; ?></p>

<?php echo Html::anchor('amigosecreto/edit/'.$amigosecreto->id, 'Edit'); ?> |
<?php echo Html::anchor('amigosecreto', 'Back'); ?>

<?php echo var_dump($amigosecreto->users); ?>