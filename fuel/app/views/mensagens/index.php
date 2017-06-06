<h2>Listing <span class='muted'>Mensagens</span></h2>
<br>
<?php if ($mensagens): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Mensagem</th>
			<th>Idusersend</th>
			<th>Iduserreceived</th>
			<th>Read</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($mensagens as $item): ?>		<tr>

			<td><?php echo $item->mensagem; ?></td>
			<td><?php echo $item->idusersend; ?></td>
			<td><?php echo $item->iduserreceived; ?></td>
			<td><?php echo $item->read; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('mensagens/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('mensagens/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('mensagens/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Mensagens.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('mensagens/create', 'Add new Mensagen', array('class' => 'btn btn-success')); ?>

</p>
