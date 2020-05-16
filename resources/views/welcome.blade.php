@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')

<h3><a href="{{ route('admin/tallas') }}">-Mostrar tallas</a></h3>

<h3><a href="{{ route('admin/colors') }}">-Mostrar colores</a></h3>

<h3><a href="{{ route('admin/usuarios') }}">-Mostrar usuarios</a></h3>

<h3><a href="{{ route('admin/productos') }}">-Mostrar productos</a></h3>


@endsection