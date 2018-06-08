<section class="content-header">
	<h1><?= h($transaction->id) ?></h1>				
</section>			
<section class="content">				
	<div class="box">
		<div class="box-header with-border">				
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example_os">							
				<tr>
					<th scope="row"><?= __('User') ?></th>
					<td><?= $transaction->has('user') ? $this->Html->link($transaction->user->id, ['controller' => 'Users', 'action' => 'view', $transaction->user->id]) : '' ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Reservation') ?></th>
					<td><?= $transaction->has('reservation') ? $this->Html->link($transaction->reservation->id, ['controller' => 'Reservations', 'action' => 'view', $transaction->reservation->id]) : '' ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Id') ?></th>
					<td><?= $this->Number->format($transaction->id) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Amount') ?></th>
					<td><?= $this->Number->format($transaction->amount) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Created') ?></th>
					<td><?= h($transaction->created) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Modified') ?></th>
					<td><?= h($transaction->modified) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Date') ?></th>
					<td><?= h($transaction->date) ?></td>
				</tr>
			</table>
		</div>
	</div>	
</div>
<?php echo $this->Html->script('/assets/widgets/datatable/datatable.js'); ?>
<?php echo $this->Html->script('/assets/widgets/datatable/datatable-bootstrap.js'); ?>
<?php echo $this->Html->script('/assets/widgets/datatable/datatable-tabletools.js'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable-example').dataTable();
    });
</script>