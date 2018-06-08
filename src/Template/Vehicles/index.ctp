<?php echo $this->Html->css('vehicles.css'); ?>
<section class="content-header">
	<h1>vehicle</h1>				
</section>			
<section class="content" id="vehicleData">				
	<div class="row">
		<?php foreach ($vehicles as $vehicle): ?>
		<div class="col-md-3">			
			<div class="box box-widget widget-user">				
				<div class="widget-user-header backgroundimg" style="background: url('./dist/img/tuv300.jpg') center center;">					
				</div>				
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-6">
							<label><?php echo $vehicle->model; ?></label>
							<label><?php echo $vehicle->year; ?></label>
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
					<div class="row">
						<div class="col-sm-6">
							<div class="description-block">							
								<a href="<?php echo $this->Url->build(array('controller'=>'Reservations','action'=>'index'));?>" class="btn btn-block btn-success">RESERVATIONS</a>
								<!--<button type="button" class="btn btn-block btn-success">RESERVATIONS</button>-->
							</div>							
						</div>
						<div class="col-sm-6">
							<div class="description-block">							
								<a href="<?php echo $this->Url->build(array('controller'=>'RecentMessage','action'=>'index'));?>" class="btn btn-block btn-success">MESSAGEING OPTIONS</a>
								<!--<button type="button" class="btn btn-block btn-success">MESSAGEING OPTIONS</button>-->
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>		
		<?php endforeach; ?>
	</div>
</section>
