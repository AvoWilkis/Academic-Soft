<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Asignaciones;
use Illuminate\Http\Request;

class AsignacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaciones = Asignaciones::all();
        return view('asignaciones.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('asignaciones.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            // 'usuario_id' => 'required|exists:users,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_inicio' => 'required|date',
            'fecha_finalizacion' => 'required|date|after_or_equal:fecha_inicio',
            'importe' => 'required|numeric|min:0',
            'estado' => 'boolean',
        ]);

        // Asignaciones::create($request->all());

        // return redirect('/asignaciones')->with('success', 'Registro agregado ');

        // dd($request);


        $cursos=new Asignaciones();
        $cursos->usuario_id=auth()->user()->id;
        $cursos->curso_id=$request->curso_id;
        $cursos->fecha_inicio=$request->fecha_inicio;
        $cursos->fecha_finalizacion=$request->fecha_finalizacion;
        $cursos->importe=$request->importe;
        $cursos->estado=true;
        if($cursos->save()){
            return redirect('/asignaciones')->with('success', 'Registro agregado ');

        }else{
            return back()->with('error', 'El campo registro no fué realizado');
        }

        // Asignaciones::create($request->all());

        // return redirect()->route('asignaciones.index')
        //     ->with('success', 'Asignación creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignaciones $asignaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asignar = Asignaciones::findOrFail ($id);
        $cursos = Curso::all();
        return view('asignaciones.edit', compact('asignar', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $asignacion = $request->validate([
            // 'usuario_id' => 'required|exists:users,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_inicio' => 'required|date',
            'fecha_finalizacion' => 'required|date|after_or_equal:fecha_inicio',
            'importe' => 'required|numeric|min:0',
            'estado' => 'boolean',
        ]);

        $asignacion = Asignaciones::find($id);

        $asignacion->curso_id = $request->curso_id;
        $asignacion->fecha_inicio = $request->fecha_inicio;
        $asignacion->fecha_finalizacion = $request->fecha_finalizacion;
        $asignacion->importe = $request->importe;
        // $asignacion->estado = $request->has('estado'); // Para el checkbox de estado

    // Guardar los cambios
    if ($asignacion->save()) {
        // return redirect()->route('asignaciones.index')
        //     ->with('success', 'Asignación actualizada correctamente.');
        return redirect('/asignaciones')->with('success', 'Servicio Actualizado exitosamente');
    } else {
        return back()->with('error', 'No se pudo actualizar la asignación.');
    }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignaciones $asignaciones)
    {

    }

    public function estado($id){
        $asignacion = Asignaciones::find($id);
        $asignacion->estado = !$asignacion->estado;
        if($asignacion->save()){
        return redirect('/asignaciones')->with('success', 'Estado actualizado correctamente');
        }else{
        return back()->with('error', 'El estado no fué actualizado');
        }
    }
}





