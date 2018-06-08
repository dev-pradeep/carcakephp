<section class="content-header">
	<h1>Driver</h1>				
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
						<th scope="col"><?= $this->Paginator->sort('profile_name') ?></th>
						<th scope="col"><?= $this->Paginator->sort('full_name') ?></th>
						<th scope="col"><?= $this->Paginator->sort('works') ?></th>
						<th scope="col"><?= $this->Paginator->sort('lives') ?></th>
						<th scope="col"><?= $this->Paginator->sort('school') ?></th>
						<th scope="col"><?= $this->Paginator->sort('joined') ?></th>
						<th scope="col"><?= $this->Paginator->sort('num_of_trips') ?></th>
						<th scope="col"><?= $this->Paginator->sort('num_of_reviews') ?></th>
						<th scope="col"><?= $this->Paginator->sort('overall_rating') ?></th>
						<th scope="col"><?= $this->Paginator->sort('photo') ?></th>
						<th scope="col" class="actions"><?= __('Actions') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($drivers as $driver): ?>
					<tr>
						<td><?= $this->Number->format($driver->id) ?></td>
						<td><?= h($driver->created) ?></td>
						<td><?= h($driver->modified) ?></td>
						<td><?= h($driver->profile_name) ?></td>
						<td><?= h($driver->full_name) ?></td>
						<td><?= h($driver->works) ?></td>
						<td><?= h($driver->lives) ?></td>
						<td><?= h($driver->school) ?></td>
						<td><?= h($driver->joined) ?></td>
						<td><?= $this->Number->format($driver->num_of_trips) ?></td>
						<td><?= $this->Number->format($driver->num_of_reviews) ?></td>
						<td><?= $this->Number->format($driver->overall_rating) ?></td>
						<td><?= h($driver->photo) ?></td>
						<td class="actions">
							<?= $this->Html->link(__('View'), ['action' => 'view', $driver->id]) ?>
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $driver->id]) ?>
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $driver->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driver->id)]) ?>
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