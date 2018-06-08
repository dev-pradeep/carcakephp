<div id="page-content">
	<div class="container">
		<div id="page-title">
			<h2>Stripe Payment</h2>			
			<div id="theme-options" class="admin-options">
			</div>
		</div>
	</div>
	<div class="panel">
		<div class="panel-body">			
			<div class="example-box-wrapper">				
				<form action="#" method="POST">
				  <div id="stripePay" style="display:none;"></div>
				  <input type="hidden" id="amountplan" value="350" name="amount">
				  <input type="hidden" id="user_plan" value="350" name="user_plan">
				</form>
				<!-- Trigger the modal with a button -->
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Select Plan</button>
			</div>
		</div>
	</div>	
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Plan</h4>
      </div>
      <div class="modal-body row">        
		<?php foreach($plan as $planname): ?>
			<div class="col-md-4">				
				<p style="margin: 2px;"><button type="button" data-amount="<?php echo $planname->amount ;?>" data_plan_name="<?php echo $planname->plan_name ;?>" data_plan_id="<?php echo $planname->plan_stripe_id ;?>" class="btn btn-info btn-lg select-plan"><?php echo $planname->plan_name ;?></button></p>
			</div>
		<?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>