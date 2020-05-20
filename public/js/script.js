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

$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<3;i++) {
    next=next.next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  }
});