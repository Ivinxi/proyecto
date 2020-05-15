$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function(){
	var error = $('#modalCreate').find('.is-invalid');

	if(error.length > 0)
		$('#modalCreate').modal('show');

});