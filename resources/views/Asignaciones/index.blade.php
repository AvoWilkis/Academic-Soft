@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-6">
            <h1 class="m-0"><p>Academic Soft</p></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Listado de Asignaciones</div>
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{url('/asignaciones/registrar')}}" class="btn btn-dark text-end">Nuevo Usuario</a>
                        </div>

                        <div class="table-responsive mt-3">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Usuario</th>
                                        <th>Curso</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha de finalización</th>
                                        <th>Importe</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asignaciones as $key => $item)
                                    <tr>
                                        <td>{{$key + 1}}</td>

                                        <td>{{$item->usuario->name}}</td>

                                        <td>{{$item->curso->nombre}}</td>
                                        {{-- <td>
                                            <a href="{{url('/cursos/ver/'. $item->curso->nombre)}}" class="btn btn-link">{{$item->curso->nombre}}</a>
                                        </td> --}}
                                        <td>{{ $item->fecha_inicio }}</td>
                                        <td>{{ $item->fecha_finalizacion }}</td>

                                        <td>{{$item->importe}}</td>

                                        <td>
                                            @if ($item->estado == true)
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/asignaciones/actualizar/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @if($item->estado == true)
                                            <a href="{{url('/asignaciones/estado/'.$item->id)}}" class="btn btn-danger btn-sm"><i class="fabs fa-ban"></i></a>
                                            @else
                                            <a href="{{url('/asignaciones/estado/'.$item->id)}}" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                                            @endif
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
