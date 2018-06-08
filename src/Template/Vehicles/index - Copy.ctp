<section class="content-header">
	<h1>vehicle</h1>				
</section>			
<section class="content">				
	<div class="box">
		<div class="box-header with-border">
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">					
				<thead>
					<tr>
						<th scope="col"><?= $this->Paginator->sort('id') ?></th>
						<th scope="col"><?= $this->Paginator->sort('created') ?></th>
						<th scope="col"><?= $this->Paginator->sort('modified') ?></th>
						<th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
						<th scope="col"><?= $this->Paginator->sort('year') ?></th>
						<th scope="col"><?= $this->Paginator->sort('make') ?></th>
						<th scope="col"><?= $this->Paginator->sort('model') ?></th>
						<th scope="col"><?= $this->Paginator->sort('photo') ?></th>
						<th scope="col" class="actions"><?= __('Actions') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($vehicles as $vehicle): ?>
					<tr class="odd gradeX">
						<td><?= $this->Number->format($vehicle->id) ?></td>
						<td><?= h($vehicle->created) ?></td>
						<td><?= h($vehicle->modified) ?></td>
						<td><?= $vehicle->has('user') ? $this->Html->link($vehicle->user->id, ['controller' => 'Users', 'action' => 'view', $vehicle->user->id]) : '' ?></td>
						<td><?= $this->Number->format($vehicle->year) ?></td>
						<td><?= h($vehicle->make) ?></td>
						<td><?= h($vehicle->model) ?></td>
						<td><?= h($vehicle->photo) ?></td>
						<td class="center">
							<?= $this->Html->link(__('View'), ['action' => 'view', $vehicle->id]) ?>
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehicle->id]) ?>
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]) ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>			
		</div>
	</div>	
</section>
<?php echo $this->Html->script('/assets/widgets/datatable/datatable.js'); ?>
<?php echo $this->Html->script('/assets/widgets/datatable/datatable-bootstrap.js'); ?>
<?php echo $this->Html->script('/assets/widgets/datatable/datatable-tabletools.js'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable-example').dataTable();
    });
</script>