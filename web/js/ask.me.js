$(document).ready(function() {
	$('a').filter(function() {
		return this.hostname && this.hostname !== location.hostname;
	}).addClass('external').click(function(e) {
		open(this.href);
		e.preventDefault();
	});
	
	$('#message').fadeOut(3000);
	
	var url = document.location.toString();
	if (url.match('#')) {
		$('.page#' + url.split('#')[1]).show();
	} else {
		$('.page:first').show();
	}
	
	$('#menu .item a').filter(function() {
		return this.href.match('#');
	}).click(function(e) {
		var element = $('#' + $(this).attr('href').split('#')[1]);
		element.siblings().hide();
		element.show();
	});
});