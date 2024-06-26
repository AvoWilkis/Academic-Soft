@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Educación</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Nuevo</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Nuevo registro:</div>

                        <div class="card-body">

                            <form action="{{url('/asignaciones/actualizar/' . $asignar->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="curso_id">Curso:</label>
                                    <select name="curso_id" id="curso_id" class="form-control">
                                        @foreach ($cursos as $curso)
                                            {{-- <option value="{{$curso->id}}">{{ $curso->id == $asignar->curso_id ? 'selected' : '' }}{{ $curso->nombre }}</option> --}}
                                            {{-- @if ($asignar->curso_id == $curso->id) selected @endif>{{ $curso->nombre }}</option> --}}
                                                 <option value="{{ $curso->id }}" {{ $curso->id == $asignar->curso_id ? 'selected' : '' }}>{{ $curso->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('usuario')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="curso">Curso:</label>
                                    <input type="text" name="curso" value="{{old('curso')}}" class="form-control">
                                    @error('curso')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div> --}}

                                {{-- <div class="col-12" id="contenedor" style="display:none">
                                    <label for="fecha_inicio">Fecha de inicio:</label>
                                    <div class="input-group date form-group" id="datepicker">
                                        <input type="text" class="form-control" id="Dates" name="fechas" placeholder="Seleccione fechas" />
                                        <span class="input-group-addon input-group-text"><i class="fa fa-calendar"></i><span class="count"></span></span>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label for="fecha_inicio">Fecha de Inicio:</label>
                                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{$asignar->fecha_inicio}}">
                                </div>
                                <div class="form-group">
                                    <label for="fecha_finalizacion">Fecha de Finalización:</label>
                                    <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" class="form-control" value="{{$asignar->fecha_finalizacion}}">
                                </div>

                                <div class="form-group">
                                    <label for="importe">Importe:</label>
                                    <input type="text" name="importe" value="{{old('importe')}}" class="form-control" value="{{$asignar->importe}}">
                                    @error('importe')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="text-end mt-3">
                                    <a href="{{url('/asignaciones')}}" class="btn btn-primary">Volver al listado</a>
                                    <button type="submit" class="btn btn-success">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
