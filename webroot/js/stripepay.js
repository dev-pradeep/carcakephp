
$('body').on('click','.select-plan',function(){		// select paln in plan modal handleEvent	
	var palndata=$(this).data('plan')
	var palnname=palndata.plan_name
	var Planamount=palndata.amount * 100;
	var SelectPlan_id=palndata.plan_stripe_id;
	var plan_id=palndata.plan_id;
	
	$('.stripe-button').attr('data-amount',Planamount);
	
	$('#user_plan_id').val(plan_id)
	$('#amountplan').val(Planamount)
	$('#user_plan').val(SelectPlan_id)
	$('#margintrial').html(palnname)	
	$('#margintrial').show()		
	$('#myModal').modal("hide")		
	var StripeKey=$('#pk_api_key').val();	
	$('#stripePay').html('<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="'+StripeKey+'" data-name="TuroScrape" data-amount="'+Planamount+'" data-description="TuroScrape" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-allow-remember-me="false" data-currency="USD"></\script>');	
	setTimeout(function(){		
		//$('.stripe-button-el').trigger('click')
		//$('.stripe-button-el').click()		
	},3000)	
})

$('body').on('click','#register-form-submit',function(){ // register-form pay-process 		
	var formda=$('#ragister-form').serializeArray();
	var URL=$('#base_url').val();
	$.ajax({        
		dataType:"json",
		type:"post",
		data:formda,
		url: URL + 'users/signup',
		success: function(data){        																
			if(data.status=="success"){											
				$('#userData').val(JSON.stringify(data.data))						
				$('.stripe-button-el').click();										
			}else{					
				toastr.error(data.message);					
			}

		}
	});
});	