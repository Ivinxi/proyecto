@section('alertas')


@if( session('create'))				    
	<div class="alert alert-success alert-dismissible fade show" role="alert">
 		<strong>Se ha añadido correctamente</strong> 
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

@if( session('update'))	
	<div class="alert alert-success alert-dismissible fade show" role="alert">
 		<strong>Se ha actualizado correctamente</strong> 
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

@if( session('delete'))	
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
 		<strong>Se ha eliminado correctamente</strong> 
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

@if( session('restore'))				    
	<div class="alert alert-success alert-dismissible fade show" role="alert">
 		<strong>Se ha restaurado correctamente</strong> 
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

@endsection