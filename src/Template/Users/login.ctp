<div class="login-box">
	<div class="login-logo">
		<?php echo $this->Html->image('carafar12.png', ['alt' => 'Profile image','width'=>'50%','class'=>"mrg25B center-margin radius-all-100 display-block"]); ?>					
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>
		<form id="login-validation" method="post">
			<div class="form-group has-feedback">
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" required>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox"> Remember Me
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>
				<!-- /.col -->
			</div>
		</form>
		<a href="<?php echo $this->Url->build(array('controller'=>'users','action'=>'signup'))?>" class="text-center">Register a new membership</a>
	</div>
	<!-- /.login-box-body -->
</div>