   <style>
	.checked {
		color: orange;
	}
	.setdata{
	        text-align: left !important;
	}
	.box-body,.nav-tabs-custom{
		height:740px;
	}
	.profile-user-img{
		margin:0px;
	}
	</style>
   <section class="content-header">
      <h1>
         User Profile
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Examples</a></li>
         <li class="active">User profile</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">         
         <div class="col-md-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">                  
                  <li class="active"><a href="#timeline" data-toggle="tab">About me</a></li>                  
				  <li><a href="#settings" data-toggle="tab">Settings</a></li>
               </ul>
               <div class="tab-content">                  
                  <div class="tab-pane active" id="timeline">                     
					 <form class="form-horizontal">
						<div class="form-group">
							<label for="inputName" class="col-sm-5 control-label"></label>
							<label for="inputName" class="col-sm-7 control-label setdata">
								<?php echo $this->Html->image('/dist/img/user4-128x128.jpg', ['class'=>'profile-user-img img-responsive img-circle','alt' => 'Profile image']); ?>						   				  
								<h3 class="profile-username"><?php echo $user->name; ?></h3>
								<p class="text-muted">Software Engineer</p>                 
							</label>	
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-5 control-label">Name:</label>						
							<label for="inputName" class="col-sm-7 control-label setdata">Rent Quick's L.</label>						
						</div>					  
						<div class="form-group">
							<label for="inputName" class="col-sm-5 control-label">Join Date:</label>						
							<label for="inputName" class="col-sm-7 control-label setdata">2017-09-01 00:00:00</label>						
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-5 control-label">Location:</label>						
							<label for="inputName" class="col-sm-7 control-label setdata">Denver, CO</label>						
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-5 control-label">Education:</label>						
							<label for="inputName" class="col-sm-7 control-label setdata">University of Minnesota</label>						
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-5 control-label">Work:</label>						
							<label for="inputName" class="col-sm-7 control-label setdata">Rent Quick's LLC</label>						
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-5 control-label">Languages:</label>						
							<label for="inputName" class="col-sm-7 control-label setdata">English</label>						
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-5 control-label">Rating:</label>						
							<label for="inputName" class="col-sm-7 control-label setdata">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</label>
						</div>
					</form>
                  </div>
				  <div class="tab-pane" id="settings">
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
								<input type="password" name="password" value="" class="form-control" id="" placeholder="Enter password">
							</div>
						</div>						
						<div class="form-group">
							<label class="col-sm-3 control-label">Conform password</label>
							<div class="col-sm-3">
								<input type="password" name="password2" value="" class="form-control" id="" placeholder="Enter re type password">
							</div>
						</div>
						<div class="form-group text-center">
							  <button type="submit" class="btn btn-info">Save</button>
						</div>
					</form>
                  </div>                  
               </div>
               <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>