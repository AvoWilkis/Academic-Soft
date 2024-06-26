@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nueva Tarea</div>

                <div class="card-body">
                    <form action="{{ url('/tareas/registrar') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="asignacion_id">Asignación</label>
                            <select name="asignacion_id" class="form-control">
                                @foreach($asignaciones as $asignacion)
                                    <option value="{{ $asignacion->id }}">{{ $asignacion->id }}</option>
                                @endforeach
                            </select>
                            @error('asignacion_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" class="form-control" required></textarea>
                            @error('descripcion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="entrega">Entrega</label>
                            <input type="text" name="entrega" class="form-control" required>
                            @error('entrega')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nota">Nota</label>
                            <input type="text" name="nota" class="form-control" required>
                            @error('nota')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" class="form-control" required>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            @error('estado')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ url('/tareas/index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
