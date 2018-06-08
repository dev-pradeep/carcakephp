<div id="page-content">

	<div class="container">

		<div id="page-title">
			<h2>Users Edit</h2>						
			<div id="theme-options" class="admin-options">
			</div>
		</div>
	</div>
	<div class="panel">
		<div class="panel-body">
			<h3 class="title-hero">
				Elements
			</h3>			
			<div class="example-box-wrapper">
				<form method="post" accept-charset="utf-8" action="" class="form-horizontal bordered-row text-center">				
					<div class="form-group">
						<label class="col-sm-3 control-label">Name</label>
						<div class="col-sm-3">
							<input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" id="" placeholder="Enter Name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Email</label>
						<div class="col-sm-3">
							<input type="email" name="email" value="<?php echo $user->email; ?>" class="form-control" id="" placeholder="Enter Email">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-3 control-label">Password</label>
						<div class="col-sm-3">
							<input type="password" name="password" value="<?php echo $user->password; ?>" class="form-control" id="" placeholder="Enter password">
						</div>
					</div>						
					<div class="form-group">
						<label class="col-sm-3 control-label">Conform password</label>
						<div class="col-sm-3">
							<input type="password" name="password2" value="<?php echo $user->password; ?>" class="form-control" id="" placeholder="Enter re type password">
						</div>
					</div>
					<div class="form-group text-center">
						  <button type="submit" class="btn btn-info">Save Order</button>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div>