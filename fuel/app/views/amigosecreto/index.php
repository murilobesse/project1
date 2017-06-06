<h2>Listing <span class='muted'>Amigosecretos</span></h2>
<br>
<?php if ($amigosecretos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Descricao</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($amigosecretos as $item): ?>		<tr>

			<td><?php echo $item->descricao; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('amigosecreto/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('amigosecreto/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('amigosecreto/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Amigosecretos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('amigosecreto/create', 'Add new Amigosecreto', array('class' => 'btn btn-success')); ?>

</p>
