<section class="content-header">
	<h1>Users</h1>				
</section>			
<section class="content">				
	<div class="box">
		<div class="box-header with-border">												
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example">
				<thead>
					<tr>
						<th>Id</th>
						<th>name</th>
						<th>Email</th>							
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
					<tr class="odd gradeX">
						<td><?= $user->id ?></td>
						<td><?= $user->name ?></td>
						<td><?= $user->email ?></td>							
						<td class="center">
							<a href="<?php echo $this->Url->build(array('controller'=>'users','action'=>'edit',$user->id))?>" style="border: none;"><i class="glyph-icon tooltip-button demo-icon icon-edit" title="" data-original-title=".icon-edit" aria-describedby="tooltip35548"></i></a>
							
							<?=  $this->Form->postLink(
									'Delete',
									['action' => 'delete', $user->id],
									['confirm' => __('Are you sure you want to delete user with id # {0}?',$user->id)]
								);
							?>									
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