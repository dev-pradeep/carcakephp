$('#listallreser,.direct-chat-messages').slimScroll({
	height: '770px'
});
$('body').on('click','.getresarvation',function(){
	showresarvation_details();
})
$('#closecaht').click(function(){
	hideresarvation_details();
})
//hideresarvation_details()
function showresarvation_details(){
	$('#reservationsdetails').show()
	$('#Reservations').hide()
}
function hideresarvation_details(){
	$('#reservationsdetails').hide()
	$('#Reservations').show()
	
}
