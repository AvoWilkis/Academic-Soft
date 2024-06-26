@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Tarea</div>

                <div class="card-body">
                    {{-- <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
                        @method('PUT')
                        @csrf --}}
                        <form action="{{ url('/tareas/actualizar/'. $tarea->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                        <div class="form-group">
                            <label for="asignacion_id">Asignación</label>
                            <select name="asignacion_id" class="form-control">
                                @foreach($asignaciones as $asignacion)
                                    <option value="{{ $asignacion->id }}" {{ $asignacion->id == $tarea->asignacion_id ? 'selected' : '' }}>{{ $asignacion->id }}</option>
                                @endforeach
                            </select>
                            @error('asignacion_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" class="form-control" required>{{ $tarea->descripcion }}</textarea>
                            @error('descripcion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="entrega">Entrega</label>
                            <input type="text" name="entrega" class="form-control" required value="{{ $tarea->entrega }}">
                            @error('entrega')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nota">Nota</label>
                            <input type="text" name="nota" class="form-control" required value="{{ $tarea->nota }}">
                            @error('nota')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" class="form-control" required>
                                <option value="1" {{ $tarea->estado ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ !$tarea->estado ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('estado')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
