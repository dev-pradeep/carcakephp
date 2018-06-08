<section class="content-header">
	<h1>Transaction</h1>				
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
						<th scope="col"><?= $this->Paginator->sort('reservation_id') ?></th>
						<th scope="col"><?= $this->Paginator->sort('amount') ?></th>
						<th scope="col"><?= $this->Paginator->sort('date') ?></th>
						<th scope="col" class="actions"><?= __('Actions') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($transactions as $transaction): ?>
					<tr class="odd gradeX">
						<td><?= $this->Number->format($transaction->id) ?></td>
						<td><?= h($transaction->created) ?></td>
						<td><?= h($transaction->modified) ?></td>
						<td><?= $transaction->has('user') ? $this->Html->link($transaction->user->id, ['controller' => 'Users', 'action' => 'view', $transaction->user->id]) : '' ?></td>
						<td><?= $transaction->has('reservation') ? $this->Html->link($transaction->reservation->id, ['controller' => 'Reservations', 'action' => 'view', $transaction->reservation->id]) : '' ?></td>
						<td><?= $this->Number->format($transaction->amount) ?></td>
						<td><?= h($transaction->date) ?></td>
						<td class="center">
							<?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id]) ?>
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id]) ?>
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?>
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