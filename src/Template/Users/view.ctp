<div id="page-content">

	<div class="container">

		<div id="page-title">
			<h2>view Users</h2>			
			<div id="theme-options" class="admin-options">
			</div>
		</div>
	</div>
	<div class="panel">
		<div class="panel-body">			
			<div class="example-box-wrapper">				
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable-example_os">
					<tr>
						<th scope="row"><?= __('Username') ?></th>
						<td><?= h($user->name) ?></td>
					</tr>
					<tr>
						<th scope="row"><?= __('Email') ?></th>
						<td><?= h($user->email) ?></td>
					</tr>
					<tr>
						<th scope="row"><?= __('Created') ?></th>
						<td><?= $user->created->format(DATE_RFC850) ?></td>
					</tr>					
				</table>				
			</div>
		</div>
	</div>	
</div>