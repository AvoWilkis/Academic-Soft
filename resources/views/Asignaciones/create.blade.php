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

                            <form action="{{url('/asignaciones/registrar/')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="form-group">
                                    <label for="curso_id">Curso:</label>
                                    <select name="curso_id" id="curso_id" class="form-control">
                                        @foreach ($cursos as $curso)
                                            <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('usuario_id')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="curso_id">Curso:</label>
                                    <input type="text" name="curso" value="{{old('curso')}}" class="form-control">
                                    @error('curso')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <label for="curso_id">Curso</label>
                                    <select type="text" name="curso_id"  class="form-control">
                                        <option value="">Seleccione...</option>
                                        @foreach ($cursos as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}
                                            {{-- @if (old('curso_id') == $item->id) selected @endif>{{$item->nombre}}</option> --}}
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <div class="col-12" id="contenedor" style="display:none">
                                    <label for="fecha_inicio">Fecha de inicio:</label>
                                    <div class="input-group date form-group" id="datepicker">
                                        <input type="text" class="form-control" id="Dates" name="fechas" placeholder="Seleccione fechas" />
                                        <span class="input-group-addon input-group-text"><i class="fa fa-calendar"></i><span class="count"></span></span>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label for="fecha_inicio">Fecha de Inicio:</label>
                                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="fecha_finalizacion">Fecha de Finalización:</label>
                                    <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="importe">Importe:</label>
                                    <input type="text" name="importe" value="{{old('importe')}}" class="form-control">
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
