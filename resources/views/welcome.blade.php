@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')

<a href="{{ route('mostrarTallas') }}">Mostrar talla</a>

<a href="{{ route('vistaCrearTalla') }}">Crear talla</a>

@endsection