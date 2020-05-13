@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')

<a href="{{ route('admin/tallas') }}">Mostrar talla</a>

<a href="{{ route('admin/tallas/create') }}">Crear talla</a>

@endsection