$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function(){
	var error = $('#modalCreate').find('.is-invalid');

	if(error.length > 0)
		$('#modalCreate').modal('show');

	var error = $('#modalStock').find('.is-invalid');

	if(error.length > 0)
		$('#modalStock').modal('show');

	$('.createStock').on('click', function() {
		var id = $(this).attr('value');

		$('#createStock #id_producto').attr('value', id);
	
	});
	
});

$(document).ready(function($) {
    $(".table-row").click(function() {
        $("#collapseExample").collapse('toggle');
    });
});