<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use App\Models\Asignaciones;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tareas::all();
        return view('tareas.index', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asignaciones = Asignaciones::all();
        return view('tareas.create', compact('asignaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'asignacion_id' => 'required|exists:asignaciones,id',
            'descripcion' => 'required|string',
            'entrega' => 'required|string',
            'nota' => 'required|string',
            'estado' => 'required|boolean',
        ]);

        Tareas::create($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea creada exitosamente.');
    }

    public function edit($id)
    {
        $tarea = Tareas::find($id);
        $asignaciones = Asignaciones::all();
        return view('tareas.edit', compact('asignaciones','tarea'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tareas $tareas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tarea = $request->validate([
            'asignacion_id' => 'required|exists:asignaciones,id',
            'descripcion' => 'required|string',
            'entrega' => 'required|string',
            'nota' => 'required|string',
            'estado' => 'boolean',
        ]);

        $tarea = Tareas::find($id);

        $tarea->asignacion_id = $request->asignacion_id;
        $tarea->descripcion = $request->descripcion;
        $tarea->entrega = $request->entrega;
        $tarea->nota = $request->nota;


        // $tarea->estado = $request->has('estado'); // Para el checkbox de estado

    // Guardar los cambios
    if ($tarea->save()) {
        // return redirect()->route('asignaciones.index')
        //     ->with('success', 'Asignación actualizada correctamente.');
        return redirect('/tareas')->with('success', 'Servicio Actualizado exitosamente');
    } else {
        return back()->with('error', 'No se pudo actualizar la asignación.');
    }
    // if ($tarea->save()) {
    //     return redirect()->route('tareas.index')->with('success', 'Tarea actualizada exitosamente.');
    // } else {
    //     return back()->with('error', 'No se pudo actualizar la tarea.');
    // }


        // $tarea->update($request->all());

        // return redirect()->route('tareas.index')->with('success', 'Tarea actualizada exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tareas $tareas)
    {
        //
    }

    public function estado($id){
        $tarea = Tareas::find($id);
        $tarea->estado = !$tarea->estado;
        if($tarea->save()){
        return redirect('/tareas')->with('success', 'Estado actualizado correctamente');
        }else{
        return back()->with('error', 'El estado no fué actualizado');
        }
    }
}
