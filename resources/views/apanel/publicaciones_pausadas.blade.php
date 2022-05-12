@extends('layouts.dashboard')
@section('title', 'Publicaciones Pausadas - ' . $seller->nickname)
@section('contenido')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Publicaciones Pausadas Del Usuario: <a href="#" style="text-decoration: none; color: black;">{{$seller->nickname}} ({{$seller->id}})</a></h2>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Foto</th>
            <th scope="col" class="text-center">Producto</th>
            <th scope="col" class="text-center">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($publicaciones_seller as $publicacion)
        <tr>
            <th scope="row" class="text-center">
                <a href="{{$publicacion->link}}">{{$publicacion->publicacion_id}}</a>
            </th>
            <td class="text-center"> <img class="thumb-ranking" src="{{$publicacion->imagen}}" alt="foto">

            </td>
            <td class="text-center">
                {{$publicacion->nombre}}
            </td>

            <td class="text-center">
                {{$publicacion->status}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection