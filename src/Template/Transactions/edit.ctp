<style>
.labelclass{
	text-align: right;
	vertical-align: middle;
	margin-top: 9px;
}
</style>
<section class="content-header">
	<h1>Edit Transaction</h1>				
</section>			
<section class="content">				
	<div class="box">
		<div class="box-header with-border">
				<?= $this->Form->create($transaction) ?>
				<fieldset>					
					 <?php
						echo $this->Form->control('user_id', ['options' => $users]);
						echo $this->Form->control('reservation_id', ['options' => $reservations]);
						echo $this->Form->control('amount');
						echo $this->Form->control('date');
					?>
				</fieldset>
				<?= $this->Form->button(__('Submit'),['class'=>"btn btn-info"]) ?>
				<?= $this->Form->end() ?>
			</div>			
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
	if(attriname=='date[month]'){
		$(this).css({'width':'10%','position':'absolute','top':'calc(100% - 38.2%)','right':'calc(100% - 46%)'})
	}else if(attriname=='date[day]'){
		$(this).css({'width':'10%','position':'absolute','top':'calc(100% - 38.2%)','right':'calc(100% - 57%)'})
	}
	
})
$('input').each(function(){			
	$(this).addClass('form-control')		
	$(this).css('width','15%')
	//$(this).next().append(this)
})
</script>