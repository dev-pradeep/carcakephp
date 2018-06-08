<div class="login-box">
	<div class="login-logo">
		<?php echo $this->Html->image('carafar12.png', ['alt' => 'Profile image','width'=>'50%','class'=>"mrg25B center-margin radius-all-100 display-block"]); ?>					
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">Sign up</p>
		<form action="<?php  echo $this->Url->build(array('controller' => 'stripe', 'action' => 'payment')); ?>" id="ragister-form"  method="post">			
			<div id="login-form" class="content-box bg-default">
				<div class="form-group has-feedback">					
					<input type="text" name="name" class="form-control" id="exampleInputname" placeholder="Enter name" required>					
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">					
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">					
					<input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password" required>					
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">					
					<input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="confirm password" required >					
					<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">					
					<label id="margintrial" style="margin-left: 11px;display:none">Trial</label>					
				</div>			
				<div class="form-group has-feedback">
					<div class="col-md-6">
						<button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">Select Plan</button>
					</div>
					<div class="col-md-6">
						<button type="button" class="btn btn-block btn-primary" id="register-form-submit">Proceed & Pay</button>
					</div>
				</div>				
			</div>
			<input id="userData" type="hidden" class="form-control" name="userData" value="">		
			<input id="user_plan" type="hidden" class="form-control" name="user_plan" value="">		
			<input id="user_plan_id" type="hidden" class="form-control" name="plan_id" value="">		
			<input type="hidden" name="amount" id="amountplan" value="" />		
			<div id="stripePay" style="display:none;">
												
			</div>
		</form>		
		<br></br>
		<a href="<?php echo $this->Url->build(array('controller'=>'users','action'=>'login'))?>" class="text-center">Already have an account ? </a>
	</div>
</div>

<?php echo $this->Html->css('registerpage.css'); ?>
<?php echo $this->Html->script('stripepay.js'); ?>
<!-- Trigger the modal with a button -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Plan</h4>
      </div>
      <div class="modal-body row">        		
		<div class="pricing-table pricing-three-column row">
			<?php foreach($plan as $planname): ?>
			<?php if($planname->plan_name=='Premium'){ ?>				
				<div class="plan col-sm-4 col-lg-4">
					<div class="plan-name-bronze">
						<h2><?php echo $planname->plan_name ;?></h2>
						<span style="font-size:18px;">+ &#x24;<?php echo $planname->amount ;?> per car that is managed</span>
					</div>
					<ul>
						<li class="plan-feature">Foreground Data Synchronizing</li>
						<li class="plan-feature">Background Data Synchronizing</li>									
						<li class="plan-feature">Analytic Graphs</li>
						<li class="plan-feature">Reservation History</li>
						<li class="plan-feature">Transaction History</li>
						<li class="plan-feature">Transfer History</li>
						<li class="plan-feature">Future Earnings Forecasts</li>
						<li class="plan-feature">Private Customer Discussion</li>
						<li class="plan-feature">Vehicle Management</li>
						<li class="plan-feature">Vehicle Mileage Tracking</li>
						<li class="plan-feature">Auto Responding Messages</li>
						<li class="plan-feature">Vehicle Tax Accounting</li>
						<li class="plan-feature">Vehicle Profit / Loss</li>
						<li class="plan-feature"><a href="#" class="btn btn-primary btn-plan-select select-plan" data-plan='<?php echo json_encode($planname); ?>' ><i class="icon-white icon-ok"></i> Select</a></li>
					</ul>
				</div>
			<?php } ?>			
			<?php if($planname->plan_name=='Standard'){ ?>		
				<div class="plan col-sm-4 col-lg-4">
					<div class="plan-name-bronze">
						<h2><?php echo $planname->plan_name ;?></h2>
						<span style="font-size:18px;">&#x24;<?php echo $planname->amount ;?></span>
					</div>
					<ul>						
						<li class="plan-feature">Foreground Data Synchronizing</li>						
						<li class="plan-feature">Analytic Graphs</li>
						<li class="plan-feature">Reservation History</li>
						<li class="plan-feature">Transaction History</li>
						<li class="plan-feature">Transfer History</li>
						<li class="plan-feature">Future Earnings Forecasts</li>
						<li class="plan-feature">Private Customer Discussion</li>						
						<li class="plan-feature"><a href="#" class="btn btn-primary btn-plan-select select-plan" data-plan='<?php echo json_encode($planname); ?>' ><i class="icon-white icon-ok"></i> Select</a></li>
					</ul>
				</div>
			<?php } ?>				
		<?php endforeach; ?>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>