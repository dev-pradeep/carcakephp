<section class="content-header">
	<h1><?= h($reservation->id) ?></h1>				
</section>			
<section class="content">				
	<div class="box">
		<div class="box-header with-border">			
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example_os">
				<tr>
					<th scope="row"><?= __('User') ?></th>
					<td><?= $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Vehicle') ?></th>
					<td><?= $reservation->has('vehicle') ? $this->Html->link($reservation->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $reservation->vehicle->id]) : '' ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Driver') ?></th>
					<td><?= $reservation->has('driver') ? $this->Html->link($reservation->driver->id, ['controller' => 'Drivers', 'action' => 'view', $reservation->driver->id]) : '' ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Id') ?></th>
					<td><?= $this->Number->format($reservation->id) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Daily Rate') ?></th>
					<td><?= $this->Number->format($reservation->daily_rate) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Rental Length') ?></th>
					<td><?= $this->Number->format($reservation->rental_length) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Trip Price') ?></th>
					<td><?= $this->Number->format($reservation->trip_price) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Delivery Fee') ?></th>
					<td><?= $this->Number->format($reservation->delivery_fee) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Extension Fee') ?></th>
					<td><?= $this->Number->format($reservation->extension_fee) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Distance Reimbursement') ?></th>
					<td><?= $this->Number->format($reservation->distance_reimbursement) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Gas Reimbursement') ?></th>
					<td><?= $this->Number->format($reservation->gas_reimbursement) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Tickets Tolls') ?></th>
					<td><?= $this->Number->format($reservation->tickets_tolls) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Fines') ?></th>
					<td><?= $this->Number->format($reservation->fines) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Additional Charges') ?></th>
					<td><?= $this->Number->format($reservation->additional_charges) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Reimbursement Total') ?></th>
					<td><?= $this->Number->format($reservation->reimbursement_total) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Trip Total') ?></th>
					<td><?= $this->Number->format($reservation->trip_total) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Turo Fees') ?></th>
					<td><?= $this->Number->format($reservation->turo_fees) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Earnings') ?></th>
					<td><?= $this->Number->format($reservation->earnings) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Created') ?></th>
					<td><?= h($reservation->created) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Modified') ?></th>
					<td><?= h($reservation->modified) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Start Date') ?></th>
					<td><?= h($reservation->start_date) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Start Time') ?></th>
					<td><?= h($reservation->start_time) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('End Date') ?></th>
					<td><?= h($reservation->end_date) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('End Time') ?></th>
					<td><?= h($reservation->end_time) ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="box">
		<div class="box-header with-border">	
			<h3 class="title-hero">
					<?= __('Related Transactions') ?>
				</h3>
			<div class="example-box-wrapper">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
					<thead>
					<tr>
						<th scope="col"><?= __('Id') ?></th>
						<th scope="col"><?= __('Created') ?></th>
						<th scope="col"><?= __('Modified') ?></th>
						<th scope="col"><?= __('User Id') ?></th>
						<th scope="col"><?= __('Reservation Id') ?></th>
						<th scope="col"><?= __('Amount') ?></th>
						<th scope="col"><?= __('Date') ?></th>
						<th scope="col" class="actions"><?= __('Actions') ?></th>
					</tr>
					</thead>
					<tbody>
						<?php foreach ($reservation->transactions as $transactions): ?>
						<tr>
							<td><?= h($transactions->id) ?></td>
							<td><?= h($transactions->created) ?></td>
							<td><?= h($transactions->modified) ?></td>
							<td><?= h($transactions->user_id) ?></td>
							<td><?= h($transactions->reservation_id) ?></td>
							<td><?= h($transactions->amount) ?></td>
							<td><?= h($transactions->date) ?></td>
							<td class="actions center">
								<?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id]) ?>
								<?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id]) ?>
								<?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
							</td>
						</tr>
						<?php endforeach; ?>						
					</tbody>
				</table>
			</div>
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