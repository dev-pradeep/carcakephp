$('#closecaht').click(function(){
	showsms();
})
$('.item').click(function(){
	showchat();
})
$('.direct-chat-messages,#listofusers').slimScroll({
	height: '710px'
});
showsms();
function showsms(){
	$('#recentmessage').show()
	$('#chathistry').hide()
}
function showchat(){
	$('#recentmessage').hide()
	$('#chathistry').show()
}