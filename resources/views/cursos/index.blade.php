@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            {{-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Productos</li>
                </ol>
            </div> --}}
        </div>
    </div>
</div>


<div class="content">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <h1 class="m-0"><p>Academic Soft</p></h1>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de cursos</div>

                <div class="card-body">
                    @include('includes.alertas')
                    <div class="row">
                        <div class="col-md-6">
                            {{-- empty --}}
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{url('/cursos/registrar')}}" class="btn btn-secondary">Nuevo</a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Imagen</th>
                                            <th>Costos</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cursos as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->nombre}}</td>
                                            <td>{{$item->descripcion}}</td>
                                            <td>
                                                <img src="{{$item->getImagenUrl()}}" alt="img" height="40px">
                                            </td>
                                            <td>{{$item->costo}}</td>

                                            <td class="text-center">
                                                @if ($item->estado == true)
                                                <span class="badge bg-success">Activo</span>
                                                @else
                                                <span class="badge bg-danger">Inactivo</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{url('/cursos/actualizar/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                                @if($item->estado == true)
                                                <a href="{{url('/cursos/estado/'.$item->id)}}" class="btn btn-danger btn-sm"><i class="fabs fa-ban"></i></a>
                                                @else
                                                <a href="{{url('/cursos/estado/'.$item->id)}}" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $cursos->links('pagination::bootstrap-4')}} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
