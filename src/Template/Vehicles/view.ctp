<section class="content-header">
	<h1><?= h($vehicle->id) ?></h1>				
</section>			
<section class="content">				
	<div class="box">
		<div class="box-header with-border">						
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example_os">							
				<tr>
					<th scope="row"><?= __('User') ?></th>
					<td><?= $vehicle->has('user') ? $this->Html->link($vehicle->user->id, ['controller' => 'Users', 'action' => 'view', $vehicle->user->id]) : '' ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Make') ?></th>
					<td><?= h($vehicle->make) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Model') ?></th>
					<td><?= h($vehicle->model) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Photo') ?></th>
					<td><?= h($vehicle->photo) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Id') ?></th>
					<td><?= $this->Number->format($vehicle->id) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Year') ?></th>
					<td><?= $this->Number->format($vehicle->year) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Created') ?></th>
					<td><?= h($vehicle->created) ?></td>
				</tr>
				<tr>
					<th scope="row"><?= __('Modified') ?></th>
					<td><?= h($vehicle->modified) ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="box">
		<div class="box-header with-border">			
			<h3 class="title-hero">
					<?= __('Related Transactions') ?>
				</h3>
			<div class="example-box-wrapper" style="overflow-y: hidden;overflow-x: scroll;">
				<?php if (!empty($vehicle->reservations)): ?>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
					<thead>
						<tr>
							<th scope="col"><?= __('Id') ?></th>
							<th scope="col"><?= __('Created') ?></th>
							<th scope="col"><?= __('Modified') ?></th>
							<th scope="col"><?= __('User Id') ?></th>
							<th scope="col"><?= __('Vehicle Id') ?></th>
							<th scope="col"><?= __('Driver Id') ?></th>
							<th scope="col"><?= __('Start Date') ?></th>
							<th scope="col"><?= __('Start Time') ?></th>
							<th scope="col"><?= __('End Date') ?></th>
							<th scope="col"><?= __('End Time') ?></th>
							<th scope="col"><?= __('Daily Rate') ?></th>
							<th scope="col"><?= __('Rental Length') ?></th>
							<th scope="col"><?= __('Trip Price') ?></th>
							<th scope="col"><?= __('Delivery Fee') ?></th>
							<th scope="col"><?= __('Extension Fee') ?></th>
							<th scope="col"><?= __('Distance Reimbursement') ?></th>
							<th scope="col"><?= __('Gas Reimbursement') ?></th>
							<th scope="col"><?= __('Tickets Tolls') ?></th>
							<th scope="col"><?= __('Fines') ?></th>
							<th scope="col"><?= __('Additional Charges') ?></th>
							<th scope="col"><?= __('Reimbursement Total') ?></th>
							<th scope="col"><?= __('Trip Total') ?></th>
							<th scope="col"><?= __('Turo Fees') ?></th>
							<th scope="col"><?= __('Earnings') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>					
					</thead>
					<tbody>
						<?php foreach ($vehicle->reservations as $reservations): ?>
						<tr>
							<td><?= h($reservations->id) ?></td>
							<td><?= h($reservations->created) ?></td>
							<td><?= h($reservations->modified) ?></td>
							<td><?= h($reservations->user_id) ?></td>
							<td><?= h($reservations->vehicle_id) ?></td>
							<td><?= h($reservations->driver_id) ?></td>
							<td><?= h($reservations->start_date) ?></td>
							<td><?= h($reservations->start_time) ?></td>
							<td><?= h($reservations->end_date) ?></td>
							<td><?= h($reservations->end_time) ?></td>
							<td><?= h($reservations->daily_rate) ?></td>
							<td><?= h($reservations->rental_length) ?></td>
							<td><?= h($reservations->trip_price) ?></td>
							<td><?= h($reservations->delivery_fee) ?></td>
							<td><?= h($reservations->extension_fee) ?></td>
							<td><?= h($reservations->distance_reimbursement) ?></td>
							<td><?= h($reservations->gas_reimbursement) ?></td>
							<td><?= h($reservations->tickets_tolls) ?></td>
							<td><?= h($reservations->fines) ?></td>
							<td><?= h($reservations->additional_charges) ?></td>
							<td><?= h($reservations->reimbursement_total) ?></td>
							<td><?= h($reservations->trip_total) ?></td>
							<td><?= h($reservations->turo_fees) ?></td>
							<td><?= h($reservations->earnings) ?></td>
							<td class="actions">
								<?= $this->Html->link(__('View'), ['controller' => 'Reservations', 'action' => 'view', $reservations->id]) ?>
								<?= $this->Html->link(__('Edit'), ['controller' => 'Reservations', 'action' => 'edit', $reservations->id]) ?>
								<?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id)]) ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php endif; ?>	
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