<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TuroScrape |
		<?= $this->fetch('title') ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<?php echo $this->Html->css('/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>
	<!-- Font Awesome -->
	<?php echo $this->Html->css('/bower_components/font-awesome/css/font-awesome.min.css'); ?>
	<!-- Ionicons -->
	<?php echo $this->Html->css('/bower_components/Ionicons/css/ionicons.min.css'); ?>
	<!-- Theme style -->
	<?php echo $this->Html->css('/dist/css/AdminLTE.min.css'); ?>
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<?php echo $this->Html->css('/dist/css/skins/_all-skins.min.css'); ?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'); ?>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js'); ?>
  <![endif]-->
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<?php echo $this->Html->css('/assets/widgets/toastr/toastr.min.css'); ?>
	<?php echo $this->Html->css('dashboard.css'); ?>
	<!-- ./wrapper -->
	<!-- jQuery 3 -->
	<?php echo $this->Html->script('/bower_components/jquery/dist/jquery.min.js'); ?>
	<!-- Bootstrap 3.3.7 -->
	<?php echo $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>
	<!-- SlimScroll -->
	<?php echo $this->Html->script('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>
	<!-- FastClick -->
	<?php echo $this->Html->script('/bower_components/fastclick/lib/fastclick.js'); ?>
	<!-- AdminLTE App -->
	<?php echo $this->Html->script('/dist/js/adminlte.min.js'); ?>
	<!-- AdminLTE for demo purposes -->
	<?php echo $this->Html->script('/dist/js/demo.js'); ?>
	<?php echo $this->Html->script('/assets/widgets/toastr/toastr.min.js'); ?>
	<style>        
        #datatable-example_filter,#datatable-example_paginate{
		    float: right !important;
		}
		.sidebar {
			padding-top: 10px;
		}    
	</style>
	<script>
		$(document).ready(function () {
		    $('.sidebar-menu').tree()
		  })
	</script>
	
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<?php use Cake\Core\Configure; ?>	
	<input type="hidden" id="pk_api_key" name="pk_api_key" value="<?php echo Configure::read('pk_key'); ?>" />
	<input type="hidden" id="sk_api_key" name="sk_api_key" value="<?php echo Configure::read('sk_key'); ?>" />
	<?php use Cake\Routing\Router; ?>
	<input type="hidden" value="<?php echo Router::url('/', true); ?>" id="base_url" name="base_url" >
	
	<!-- Site wrapper -->
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<?php echo $this->Html->image('carafar12.png', ['alt' => 'Profile image','width'=>'50%','style'=>'height:57px;','class'=>"logo"]); ?>								
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">						
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo $this->Html->image('/dist/img/user2-160x160.jpg', ['class'=>'img-circle','alt' => 'Profile image','width'=>'28']); ?> <span class="hidden-xs"><?php echo $current_user['name']; ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<?php echo $this->Html->image('/dist/img/user2-160x160.jpg', ['class'=>'img-circle','alt' => 'Profile image','width'=>'28']); ?>
									<p><span><?php echo $current_user['name']; ?></span></small>
									</p>
								</li>								
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left"> <a href="<?php  echo $this->Url->build(array('controller' => 'users', 'action' => 'profile')); ?>" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right"> <a href="<?php  echo $this->Url->build(array('controller' => 'users', 'action' => 'logout')); ?>" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>						
					</ul>
				</div>
			</nav>
		</header>
		<!-- =============================================== -->
		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">								
				<?php $planid=$this->Userplan->getPlan($current_user['id']); ?>
				<?php $usertype=$current_user['user_type']; ?>
				<ul class="sidebar-menu" data-widget="tree">															
					
					<li class="">
						<a href="<?php echo $this->Url->build(array('controller'=>'dashboard','action'=>'index'));?>"> <i class="fa fa-dashboard"></i>  <span>Dashboard</span>							
						</a>						
					</li>
					<?php if($usertype==1): ?>
					<li>
						<a href="<?php echo $this->Url->build(array('controller'=>'users','action'=>'index'));?>"> <i class="fa fa-dashboard"></i>  <span>Users</span>							
						</a>
						<!--<ul class="treeview-menu">
							<li><a href="<?php echo $this->Url->build(array('controller'=>'users','action'=>'add'));?>"><span>Add Users</span></a></li>
							<li><a href="<?php echo $this->Url->build(array('controller'=>'users','action'=>'index'));?>"><i class="fa fa-circle-o"></i>View Users</a></li>
						</ul>-->
					</li>
					<?php endif; ?>	
					<li>
						<a href="<?php echo $this->Url->build(array('controller'=>'Reservations','action'=>'index'));?>"> <i class="fa fa-dashboard"></i>  <span>Reservations</span>							
						</a>
						<!--<ul class="treeview-menu">
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Reservations','action'=>'add'));?>"><i class="fa fa-circle-o"></i>Add Reservations</a>
							</li>
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Reservations','action'=>'index'));?>"><i class="fa fa-circle-o"></i>View Reservations</a>
							</li>
						</ul>-->
					</li>	
					
					<li>
						<a href="<?php echo $this->Url->build(array('controller'=>'Vehicles','action'=>'index'));?>"> <i class="fa fa-dashboard"></i>  <span>Vehicles</span>							
						</a>
						<!--<ul class="treeview-menu">
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Vehicles','action'=>'add'));?>"><i class="fa fa-circle-o"></i>Add Vehicles</a>
							</li>
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Vehicles','action'=>'index'));?>"><i class="fa fa-circle-o"></i>View Vehicles</a>
							</li>
						</ul>-->
					</li>
					<li>
						<a href="<?php echo $this->Url->build(array('controller'=>'RecentMessage','action'=>'index'));?>"> <i class="fa fa-dashboard"></i>  <span>RecentMessage</span>							
						</a>
						<!--<ul class="treeview-menu">
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Vehicles','action'=>'add'));?>"><i class="fa fa-circle-o"></i>Add Vehicles</a>
							</li>
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Vehicles','action'=>'index'));?>"><i class="fa fa-circle-o"></i>View Vehicles</a>
							</li>
						</ul>-->
					</li>
					<li>
						<a href="<?php echo $this->Url->build(array('controller'=>'Revenue','action'=>'index'));?>"> <i class="fa fa-dashboard"></i>  <span>Revenue</span>							
						</a>
						<!--<ul class="treeview-menu">
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Vehicles','action'=>'add'));?>"><i class="fa fa-circle-o"></i>Add Vehicles</a>
							</li>
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Vehicles','action'=>'index'));?>"><i class="fa fa-circle-o"></i>View Vehicles</a>
							</li>
						</ul>-->
					</li>
					<li>
						<a href="<?php echo $this->Url->build(array('controller'=>'Bookings','action'=>'index'));?>"> <i class="fa fa-dashboard"></i>  <span>Bookings</span>							
						</a>
						<!--<ul class="treeview-menu">
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Vehicles','action'=>'add'));?>"><i class="fa fa-circle-o"></i>Add Vehicles</a>
							</li>
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Vehicles','action'=>'index'));?>"><i class="fa fa-circle-o"></i>View Vehicles</a>
							</li>
						</ul>-->
					</li>
					<!--<li>
						<a href="<?php echo $this->Url->build(array('controller'=>'Drivers','action'=>'index'));?>"> <i class="fa fa-dashboard"></i>  <span>Drivers</span>							
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Drivers','action'=>'add'));?>"><i class="fa fa-circle-o"></i>Add Drivers</a>
							</li>
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Drivers','action'=>'index'));?>"><i class="fa fa-circle-o"></i>View Drivers</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="<?php echo $this->Url->build(array('controller'=>'Transactions','action'=>'index'));?>"> <i class="fa fa-dashboard"></i>  <span>Transactions</span>							
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Transactions','action'=>'add'));?>"><i class="fa fa-circle-o"></i>Add Transactions</a>
							</li>
							<li>
								<a href="<?php echo $this->Url->build(array('controller'=>'Transactions','action'=>'index'));?>"><i class="fa fa-circle-o"></i>View Transactions</a>
							</li>
						</ul>
					</li>-->	
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
		<!-- =============================================== -->
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<?= $this->fetch('content') ?>						
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
		<div class="pull-right hidden-xs"> <b>Version</b> 2.4.0</div> <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Carafar</a>.</strong> All rights reserved.
		</footer>
		
	</div>
	
</body>
<?php echo $this->Flash->render(); ?> 	
</html>