@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <h1 class="m-0"><p>Academic Soft</p></h1>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Tareas</div>

                <div class="card-body text-end">
                    <a href="{{ url('/tareas/registrar') }}" class="btn btn-secondary mb-3">Nueva Tarea</a>

                    {{-- @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif --}}

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Asignación</th>
                                <th>Descripción</th>
                                <th>Entrega</th>
                                <th>Nota</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tareas as $tarea)
                                <tr>
                                    <td>{{ $tarea->id }}</td>
                                    <td>{{ $tarea->asignacion->id }}</td>
                                    <td>{{ $tarea->descripcion }}</td>
                                    <td>{{ $tarea->entrega }}</td>
                                    <td>{{ $tarea->nota }}</td>
                                    {{-- <td>{{ $tarea->estado ? 'Activo' : 'Inactivo' }}</td> --}}
                                    <td>
                                        @if ($tarea->estado == true)
                                            <span class="badge bg-success">Activo</span>
                                        @else
                                            <span class="badge bg-danger">Inactivo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('/tareas/actualizar/'.$tarea->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        @if($tarea->estado == true)
                                        <a href="{{url('/tareas/estado/'.$tarea->id)}}" class="btn btn-danger btn-sm"><i class="fabs fa-ban"></i></a>
                                        @else
                                        <a href="{{url('/tareas/estado/'.$tarea->id)}}" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
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
@endsection
