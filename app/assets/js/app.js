$(document).ready(function() {
	$('.table-result a.area').click(function(e) {
		e.preventDefault();
		var tr = $(this).closest('tr');
		var trNumber = tr.data('tr');
		var selector = ".table-result tbody.tr-group[data-tr=" + trNumber + "]";
		$(selector).toggle(); 
	});
});