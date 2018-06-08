<section class="content-header">
	<h1>Reservations</h1>				
</section>			
<section class="content">				
	<div class="box">
		<div class="box-header with-border">		
			<div class="example-box-wrapper" style="overflow-y: hidden;overflow-x: scroll;">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
					<thead>
						<tr>
							<th scope="col"><?= $this->Paginator->sort('id') ?></th>
							<th scope="col"><?= $this->Paginator->sort('created') ?></th>
							<th scope="col"><?= $this->Paginator->sort('modified') ?></th>
							<th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
							<th scope="col"><?= $this->Paginator->sort('vehicle_id') ?></th>
							<th scope="col"><?= $this->Paginator->sort('driver_id') ?></th>
							<th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
							<th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
							<th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
							<th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
							<th scope="col"><?= $this->Paginator->sort('daily_rate') ?></th>
							<th scope="col"><?= $this->Paginator->sort('rental_length') ?></th>
							<th scope="col"><?= $this->Paginator->sort('trip_price') ?></th>
							<th scope="col"><?= $this->Paginator->sort('delivery_fee') ?></th>
							<th scope="col"><?= $this->Paginator->sort('extension_fee') ?></th>
							<th scope="col"><?= $this->Paginator->sort('distance_reimbursement') ?></th>
							<th scope="col"><?= $this->Paginator->sort('gas_reimbursement') ?></th>
							<th scope="col"><?= $this->Paginator->sort('tickets_tolls') ?></th>
							<th scope="col"><?= $this->Paginator->sort('fines') ?></th>
							<th scope="col"><?= $this->Paginator->sort('additional_charges') ?></th>
							<th scope="col"><?= $this->Paginator->sort('reimbursement_total') ?></th>
							<th scope="col"><?= $this->Paginator->sort('trip_total') ?></th>
							<th scope="col"><?= $this->Paginator->sort('turo_fees') ?></th>
							<th scope="col"><?= $this->Paginator->sort('earnings') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($reservations as $reservation): ?>
							<tr class="odd gradeX">
								<td><?= $this->Number->format($reservation->id) ?></td>
								<td><?= h($reservation->created) ?></td>
								<td><?= h($reservation->modified) ?></td>
								<td><?= $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
								<td><?= $reservation->has('vehicle') ? $this->Html->link($reservation->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $reservation->vehicle->id]) : '' ?></td>
								<td><?= $reservation->has('driver') ? $this->Html->link($reservation->driver->id, ['controller' => 'Drivers', 'action' => 'view', $reservation->driver->id]) : '' ?></td>
								<td><?= h($reservation->start_date) ?></td>
								<td><?= h($reservation->start_time) ?></td>
								<td><?= h($reservation->end_date) ?></td>
								<td><?= h($reservation->end_time) ?></td>
								<td><?= $this->Number->format($reservation->daily_rate) ?></td>
								<td><?= $this->Number->format($reservation->rental_length) ?></td>
								<td><?= $this->Number->format($reservation->trip_price) ?></td>
								<td><?= $this->Number->format($reservation->delivery_fee) ?></td>
								<td><?= $this->Number->format($reservation->extension_fee) ?></td>
								<td><?= $this->Number->format($reservation->distance_reimbursement) ?></td>
								<td><?= $this->Number->format($reservation->gas_reimbursement) ?></td>
								<td><?= $this->Number->format($reservation->tickets_tolls) ?></td>
								<td><?= $this->Number->format($reservation->fines) ?></td>
								<td><?= $this->Number->format($reservation->additional_charges) ?></td>
								<td><?= $this->Number->format($reservation->reimbursement_total) ?></td>
								<td><?= $this->Number->format($reservation->trip_total) ?></td>
								<td><?= $this->Number->format($reservation->turo_fees) ?></td>
								<td><?= $this->Number->format($reservation->earnings) ?></td>
								<td class="actions center">
									<?= $this->Html->link(__('View'), ['action' => 'view', $reservation->id]) ?>
									<?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservation->id]) ?>
									<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?>
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
        $('#datatable-example').DataTable({
			responsive: true
		});
    });
</script>