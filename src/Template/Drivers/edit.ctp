<style>
.labelclass{
	text-align: right;
	vertical-align: middle;
	margin-top: 9px;
}
</style>
<section class="content-header">
	<h1>Edit Driver</h1>				
</section>			
<section class="content">				
	<div class="box">
		<div class="box-header with-border">
			 <?= $this->Form->create($driver) ?>
			<fieldset>					
				<?php
					echo $this->Form->control('profile_name');
					echo $this->Form->control('full_name');
					echo $this->Form->control('works');
					echo $this->Form->control('lives');
					echo $this->Form->control('school');
					echo $this->Form->control('joined');
					echo $this->Form->control('num_of_trips');
					echo $this->Form->control('num_of_reviews');
					echo $this->Form->control('overall_rating');
					echo $this->Form->control('photo');
				?>
			<?= $this->Form->button(__('Submit'),['class'=>"btn btn-info"]) ?>
			<?= $this->Form->end() ?>		
		</div>
	</div>	
</section>
<script>

$('.input').each(function(){	
	$(this).removeClass('input select text')
	$(this).addClass('form-group')
	$(this).append('<div class="col-sm-2"></div>')
})
$('label').each(function(){		
	$(this).addClass('col-sm-3 control-label labelclass')
})
$('select').each(function(){		
	$(this).addClass('form-control')	
	$(this).css('width','10%')	
	var attriname=$(this).attr('name')
	if(attriname=='start_date[month]'){
		$(this).css({'width':'10%','position':'absolute','top':'calc(100% - 86.2%)','right':'calc(100% - 46%)'})
	}else if(attriname=='start_date[day]'){
		$(this).css({'width':'10%','position':'absolute','top':'calc(100% - 86.2%)','right':'calc(100% - 57%)'})
	}else if(attriname=='start_time[minute]'){
		$(this).css({'width':'10%','position':'absolute','top':'calc(100% - 81.9%)','right':'calc(100% - 46%)'})
	}
	
	if(attriname=='end_date[month]'){
		$(this).css({'width':'10%','position':'absolute','top':'calc(100% - 77.5%)','right':'calc(100% - 46%)'})
	}else if(attriname=='end_date[day]'){
		$(this).css({'width':'10%','position':'absolute','top':'calc(100% - 77.5%)','right':'calc(100% - 57%)'})
	}else if(attriname=='end_time[minute]'){
		$(this).css({'width':'10%','position':'absolute','top':'calc(100% - 72.9%)','right':'calc(100% - 46%)'})
	}
	
	
})
$('input').each(function(){			
	$(this).addClass('form-control')		
	$(this).css('width','15%')
	//$(this).next().append(this)
})
</script>