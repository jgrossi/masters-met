$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
	$('[data-toggle="popover"]').popover({
		trigger: 'hover',
		// html: true,
		template: '<div class="popover" role="tooltip"><div class="arrow"></div><em><p class="popover-title"></p></em><div class="popover-content"></div></div>'
	});
	// Loading box
	$('.box-loading').css('marginTop', $('.box-loading').height()/2*-1-20);
});