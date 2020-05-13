@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')

<a href="{{ route('admin/tallas') }}">Mostrar tallas</a>

<a href="{{ route('admin/colors') }}">Mostrar colores</a>


@endsection