@section('menu_categoria')
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top" id="menu-categoria">
	<div class="container">
		<ul class="nav nav-pills">
	 		<li class="nav-item dropdown dropdown-hover">
				<a class="nav-link lora" href="{{route('target', 'hombre')}}" role="button" aria-haspopup="true" aria-expanded="false">Hombre</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'camisetas'])}}">Camisetas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'polos'])}}">Polos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'camisas'])}}">Camisas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'jerséis'])}}">Jerséis</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'sudaderas'])}}">Sudaderas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'pantalones'])}}">Pantalones</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'vaqueros'])}}">Vaqueros</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'abrigos'])}}">Abrigos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'chaquetas'])}}">Chaquetas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'ropa-interior'])}}">Ropa interior</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'trajes'])}}">Trajes</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'pijamas-y-batas'])}}">Pijamas y Batas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'ropa-de-baño'])}}">Ropa de baño</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'zapatos'])}}">Zapatos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'hombre', 'categoria' => 'accesorios'])}}">Accesorios</a>
				</div>
			</li>
	 		<li class="nav-item dropdown dropdown-hover">
				<a class="nav-link lora" href="{{route('target', 'mujer')}}" role="button" aria-haspopup="true" aria-expanded="false">Mujer</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'camisetas'])}}">Camisetas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'camisas'])}}">Camisas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'tops-y-blusas'])}}">Tops y Blusas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'jerséis'])}}">Jerséis</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'sudaderas'])}}">Sudaderas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'pantalones'])}}">Pantalones</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'vaqueros'])}}">Vaqueros</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'faldas'])}}">Faldas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'shorts'])}}">Shorts</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'leggins'])}}">Leggins</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'vestidos'])}}">Vestidos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'abrigos'])}}">Abrigos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'chaquetas'])}}">Chaquetas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'monos'])}}">Monos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'ropa-interior'])}}">Ropa interior</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'pijamas-y-batas'])}}">Pijamas y Batas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'ropa-de-baño'])}}">Ropa de baño</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'zapatos'])}}">Zapatos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'mujer', 'categoria' => 'accesorios'])}}">Accesorios</a>
				</div>
			</li>
	 		<li class="nav-item dropdown dropdown-hover">
				<a class="nav-link lora" href="{{route('target', 'niña')}}" role="button" aria-haspopup="true" aria-expanded="false">Niña</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'camisas'])}}">Camisetas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'camisas'])}}">Camisas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'tops-y-blusas'])}}">Tops y Blusas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'jerséis'])}}">Jerséis</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'sudaderas'])}}">Sudaderas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'pantalones'])}}">Pantalones</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'vaqueros'])}}">Vaqueros</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'faldas'])}}">Faldas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'shorts'])}}">Shorts</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'leggins'])}}">Leggins</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'vestidos'])}}">Vestidos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'abrigos'])}}">Abrigos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'chaquetas'])}}">Chaquetas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'monos'])}}">Monos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'ropa-interior'])}}">Ropa interior</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'pijamas-y-batas'])}}">Pijamas y Batas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'ropa-de-baño'])}}">Ropa de baño</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'zapatos'])}}">Zapatos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niña', 'categoria' => 'accesorios'])}}">Accesorios</a>
				</div>
			</li>
	 		<li class="nav-item dropdown dropdown-hover">
				<a class="nav-link lora" href="{{route('target', 'niño')}}" role="button" aria-haspopup="true" aria-expanded="false">Niño</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'camisetas'])}}">Camisetas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'polos'])}}">Polos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'camisas'])}}">Camisas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'jerséis'])}}">Jerséis</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'sudaderas'])}}">Sudaderas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'pantalones'])}}">Pantalones</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'vaqueros'])}}">Vaqueros</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'abrigos'])}}">Abrigos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'chaquetas'])}}">Chaquetas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'ropa-interior'])}}">Ropa interior</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'trajes'])}}">Trajes</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'pijamas-y-batas'])}}">Pijamas y Batas</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'ropa-de-baño'])}}">Ropa de baño</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'zapatos'])}}">Zapatos</a>
					<a class="dropdown-item" href="{{route('categoria', [ 'target' => 'niño', 'categoria' => 'accesorios'])}}">Accesorios</a>
				</div>
			</li>
		</ul>


		 <div class="col-md-6">
		 	<form action=" {{ route('buscar') }}" method="POST">
		 		@csrf
	            <div id="custom-search-input">
	                <div class="input-group col-md-12">
	                	<form>
		                    <input type="text" class="form-control input-lg" placeholder="Buscar" name="buscar" id="buscar">
		                    <span class="input-group-btn">
		                        <button class="btn btn-info btn-lg" type="submit">
		                            <i class="fas fa-search"></i>
		                        </button>
		                    </span>
	                    </form>
	                </div>
	            </div>
	        </form>
        </div>
		
		@if(Auth::user())
			<div class="d-flex carrito ml-3" data-carrito="{{ Cart::session(Auth::user()->id_usuario)->getTotalQuantity() }}">
				<a href="{{ route('mostrarCarrito') }}" class="btn btn-carrito"><i class="fas fa-shopping-cart fa-lg"></i></a>
			</div>
		@else
			<a href="{{ route('mostrarCarrito') }}" class="btn btn-carrito"><i class="fas fa-shopping-cart fa-lg"></i></a>
		@endif
		

	</div>
</nav>

@endsection