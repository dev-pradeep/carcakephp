
<?php echo $this->Html->css('vehicles.css'); ?>
<section class="content-header">
	<h1>Reservations</h1>				
</section>
<section class="content" id="Reservations">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<div class="box-body">
					<ul class="products-list product-list-in-box" id="listallreser">
						<?php foreach ($reservations as $reservation): ?>
						<?php //echo "<pre>"; print_r($reservation); exit; ?>
						<li class="item getresarvation">
							<div class="col-md-4">
								<div class="product-img">
									<img src="dist/img/user1-128x128.jpg" alt="Product Image">
								</div>
								<div class="product-info">
									<a class="product-title"><?php echo $reservation->user->name; ?></a>
									<span class="product-description">
										<?php echo date('Y-m-d',strtotime($reservation->start_date)); ?> <?php echo date('H:i:s',strtotime($reservation->start_time)); ?> - <?php echo date('Y-m-d',strtotime($reservation->end_date)); ?> <?php echo date('H:i:s',strtotime($reservation->end_time)); ?>
									</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="product-img">
									<?php echo $this->Html->image('/dist/img/tuv300.jpg'); ?>										
								</div>
								<div class="product-info">
									<a class="product-title"><?php echo (isset($reservation->vehicle) ? $reservation->vehicle->model : '' ); ?></a>
									<span class="product-description">
										$0.50 per mi overage
									</span>
								</div>
							</div>
							<div class="col-md-4">								
								<span class="label label-success" style="font-size: 18px;position: absolute;top: 13px;">$<?php echo $reservation->trip_price; ?></span>									
							</div>							
						</li>						
						<?php endforeach; ?>
					</ul>
				</div>				
			</div>
		</div>
	</div>
</section>
<section class="content" id="reservationsdetails" style="display:none;">
	<div class="row">
		<div class="col-md-3">				
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Users Profile</h3>
				</div>
				<div class="box-body box-profile">
					<?php echo $this->Html->image('/dist/img/user4-128x128.jpg', ['class'=>'profile-user-img img-responsive img-circle','alt' => 'Profile image']); ?>
					<h3 class="profile-username text-center">Nina Mcintire</h3>
					</br>
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
				</div>					
			</div>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Vehicle Details</h3>
				</div>
				<div class="box-body box-profile">
					<div class="box box-widget widget-user">				
					<div class="widget-user-header backgroundimg" style="background: url('./dist/img/tuv300.jpg') center center;">					
					</div>				
					<div class="box-footer">
						<div class="row">
							<div class="col-sm-6">
								<label>Jeep Wrangler</label>
								<label>2018</label>
							</div>
							<div class="col-sm-6">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 class="description-header">3,200</h5>
									<span class="description-text">SALES</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 class="description-header">13,000</h5>
									<span class="description-text">FOLLOWERS</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
							<div class="col-sm-4">
								<div class="description-block">
									<h5 class="description-header">35</h5>
									<span class="description-text">PRODUCTS</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
						</div>						
					</div>
				</div>						
				</div>					
			</div>
		</div>
		<!-- /.col -->
		<div class="col-md-9">
			<div class="tab-content">
			<div class="box box-warning direct-chat direct-chat-warning">
				<div class="box-header with-border">
					<h3 class="box-title"></h3>
					<div class="box-tools pull-right">						
						<button type="button" id="closecaht" class="btn btn-box-tool"><i class="fa fa-times"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Conversations are loaded here -->
					<div class="direct-chat-messages" style="height: 640px;">
						<!-- Message. Default to the left -->
						<div class="direct-chat-msg">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-left">Alexander Pierce</span>
								<span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
							</div>
							<!-- /.direct-chat-info -->
							<img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								Is this template really for free? That's unbelievable!
							</div>
							<!-- /.direct-chat-text -->
						</div>
						<!-- /.direct-chat-msg -->
						
						<!-- Message to the right -->
						<div class="direct-chat-msg right">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-right">Sarah Bullock</span>
								<span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
							</div>
							<!-- /.direct-chat-info -->
							<img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								You better believe it!
							</div>
							<!-- /.direct-chat-text -->
						</div>
						<!-- /.direct-chat-msg -->
						
						<!-- Message. Default to the left -->
						<div class="direct-chat-msg">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-left">Alexander Pierce</span>
								<span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
							</div>
							<!-- /.direct-chat-info -->
							<img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								Working with AdminLTE on a great new app! Wanna join?
							</div>
							<!-- /.direct-chat-text -->
						</div>
						<!-- /.direct-chat-msg -->
						
						<!-- Message to the right -->
						<div class="direct-chat-msg right">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-right">Sarah Bullock</span>
								<span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
							</div>
							<!-- /.direct-chat-info -->
							<img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								I would love to.
							</div>
							<!-- /.direct-chat-text -->
						</div>
						<!-- /.direct-chat-msg -->
						<div class="direct-chat-msg">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-left">Alexander Pierce</span>
								<span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
							</div>
							<!-- /.direct-chat-info -->
							<img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								Is this template really for free? That's unbelievable!
							</div>
							<!-- /.direct-chat-text -->
						</div>
						<!-- /.direct-chat-msg -->
						
						<!-- Message to the right -->
						<div class="direct-chat-msg right">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-right">Sarah Bullock</span>
								<span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
							</div>
							<!-- /.direct-chat-info -->
							<img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								You better believe it!
							</div>
							<!-- /.direct-chat-text -->
						</div>
						<!-- /.direct-chat-msg -->
						
						<!-- Message. Default to the left -->
						<div class="direct-chat-msg">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-left">Alexander Pierce</span>
								<span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
							</div>
							<!-- /.direct-chat-info -->
							<img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								Working with AdminLTE on a great new app! Wanna join?
							</div>
							<!-- /.direct-chat-text -->
						</div>
						<!-- /.direct-chat-msg -->
						
						<!-- Message to the right -->
						<div class="direct-chat-msg right">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-right">Sarah Bullock</span>
								<span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
							</div>
							<!-- /.direct-chat-info -->
							<img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								I would love to.
							</div>
							<!-- /.direct-chat-text -->
						</div>
						<div class="direct-chat-msg">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-left">Alexander Pierce</span>
								<span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
							</div>
							<!-- /.direct-chat-info -->
							<img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								Is this template really for free? That's unbelievable!
							</div>
							<!-- /.direct-chat-text -->
						</div>
						<!-- /.direct-chat-msg -->
						
						<!-- Message to the right -->
						<div class="direct-chat-msg right">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-right">Sarah Bullock</span>
								<span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
							</div>
							<!-- /.direct-chat-info -->
							<img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								You better believe it!
							</div>
							<!-- /.direct-chat-text -->
						</div>
						<!-- /.direct-chat-msg -->
						
						<!-- Message. Default to the left -->
						<div class="direct-chat-msg">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-left">Alexander Pierce</span>
								<span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
							</div>
							<!-- /.direct-chat-info -->
							<img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								Working with AdminLTE on a great new app! Wanna join?
							</div>
							<!-- /.direct-chat-text -->
						</div>
						<!-- /.direct-chat-msg -->
						
						<!-- Message to the right -->
						<div class="direct-chat-msg right">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-right">Sarah Bullock</span>
								<span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
							</div>
							<!-- /.direct-chat-info -->
							<img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								I would love to.
							</div>
							<!-- /.direct-chat-text -->
						</div>
					</div>
					<!--/.direct-chat-messages-->
					
					<!-- Contacts are loaded here -->
					<div class="direct-chat-contacts">
						<ul class="contacts-list">
							<li>
								<a href="#">
									<img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Image">
									
									<div class="contacts-list-info">
										<span class="contacts-list-name">
											Count Dracula
											<small class="contacts-list-date pull-right">2/28/2015</small>
										</span>
										<span class="contacts-list-msg">How have you been? I was...</span>
									</div>
									<!-- /.contacts-list-info -->
								</a>
							</li>
							<!-- End Contact Item -->
							<li>
								<a href="#">
									<img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Image">
									
									<div class="contacts-list-info">
										<span class="contacts-list-name">
											Sarah Doe
											<small class="contacts-list-date pull-right">2/23/2015</small>
										</span>
										<span class="contacts-list-msg">I will be waiting for...</span>
									</div>
									<!-- /.contacts-list-info -->
								</a>
							</li>
							<!-- End Contact Item -->
							<li>
								<a href="#">
									<img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Image">
									
									<div class="contacts-list-info">
										<span class="contacts-list-name">
											Nadia Jolie
											<small class="contacts-list-date pull-right">2/20/2015</small>
										</span>
										<span class="contacts-list-msg">I'll call you back at...</span>
									</div>
									<!-- /.contacts-list-info -->
								</a>
							</li>
							<!-- End Contact Item -->
							<li>
								<a href="#">
									<img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Image">
									
									<div class="contacts-list-info">
										<span class="contacts-list-name">
											Nora S. Vans
											<small class="contacts-list-date pull-right">2/10/2015</small>
										</span>
										<span class="contacts-list-msg">Where is your new...</span>
									</div>
									<!-- /.contacts-list-info -->
								</a>
							</li>
							<!-- End Contact Item -->
							<li>
								<a href="#">
									<img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Image">
									
									<div class="contacts-list-info">
										<span class="contacts-list-name">
											John K.
											<small class="contacts-list-date pull-right">1/27/2015</small>
										</span>
										<span class="contacts-list-msg">Can I take a look at...</span>
									</div>
									<!-- /.contacts-list-info -->
								</a>
							</li>
							<!-- End Contact Item -->
							<li>
								<a href="#">
									<img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Image">
									
									<div class="contacts-list-info">
										<span class="contacts-list-name">
											Kenneth M.
											<small class="contacts-list-date pull-right">1/4/2015</small>
										</span>
										<span class="contacts-list-msg">Never mind I found...</span>
									</div>
									<!-- /.contacts-list-info -->
								</a>
							</li>
							<!-- End Contact Item -->
						</ul>
						<!-- /.contatcts-list -->
					</div>
					<!-- /.direct-chat-pane -->
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<form action="#" method="post">
						<div class="input-group">
							<input type="text" name="message" placeholder="Type Message ..." class="form-control">
							<span class="input-group-btn">
								<button type="button" class="btn btn-warning btn-flat">Send</button>
							</span>
						</div>
					</form>
				</div>				
			</div>				
			</div>				
		</div>			
	</div>		
</section>	
<?php echo $this->Html->script('reservations.js'); ?>