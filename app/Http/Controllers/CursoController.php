<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('cursos.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'nombre' => 'required',
            'imagen' => 'nullable|image|mimes:png,jpg,jpeg',
            'descripcion' => 'nullable|string|min:10|max:500',
            'costo'=> 'required|numeric',
            // 'negocio_id'=>'required|exists:negocios,id',

        ]);

        if($request->file('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('curso') . '.png';
            if(!is_dir(public_path('/imagenes/cursos/'))){
                // mkdir(public_path('/imagenes/categorias/') , 0777);
                File::makeDirectory(public_path().'/imagenes/cursos/',0777,true);
            }

            $subido = $imagen->move(public_path().'/imagenes/cursos/', $nombreImagen);

        } else {
            $nombreImagen = 'default.png';
        }
        Curso::create($request->all());

        return redirect('/cursos')->with('success', 'Registro agregado ');

    // $curso = new Curso();
    // $curso->nombre = $request->nombre;
    // $curso->imagen = $nombreImagen;
    // $curso->descripcion = $request->descripcion;
    // $curso->costo = $request->costo;
    // $curso->estado = true;
    // if($curso->save()){
    //     return redirect('/cursos')->with('success', 'Registro agregado ');

    // }else{
    //     return back()->with('error', 'El campo registro no fué realizado');
    // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cursos = Curso::find ($id);
        return view('cursos.edit', compact('cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

            $request->validate([

            'nombre' => 'required',
            'imagen' => 'nullable|image|mimes:png,jpg,jpeg',
            'descripcion' => 'nullable|string|min:10|max:500',
            'costo'=> 'required|numeric',
            // 'negocio_id'=>'required|exists:negocios,id',

        ]);

        $cursos = Curso::find($id);
        if($request->file('imagen')){
            if($cursos->imagen != 'default.png'){
                if(file_exists(public_path().'/imagenes/cursos/'.$cursos->imagen)){
                    unlink(public_path().'/imagenes/cursos/'.$cursos->imagen);
                }
            }
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('cursos') . '.png';
            if(!is_dir(public_path('/imagenes/cursos/'))){
                // mkdir(public_path('/imagenes/categorias/') , 0777);
                File::makeDirectory(public_path().'/imagenes/cursos/',0777,true);
            }
            $subido = $imagen->move(public_path().'/imagenes/cursos/', $nombreImagen);
            $cursos->imagen = $nombreImagen;
        }
        $cursos->nombre = $request->nombre;
        $cursos->costo = $request->costo;
        $cursos->estado = true;
        $cursos->descripcion = $request->descripcion;
        if($cursos->save()){
            return redirect('/cursos')->with('success', 'Registro actualizado correctamente');
        }else{
            return back()->with('error', 'El registro no fué actualizado');
        }
        // Curso::create($request->all());

        // return redirect('/cursos')->with('success', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //
    }

    public function estado($id){
        $curso = Curso::find($id);
        $curso->estado = !$curso->estado;
        if($curso->save()){
        return redirect('/cursos')->with('success', 'Estado actualizado correctamente');
        }else{
        return back()->with('error', 'El estado no fué actualizado');
        }
    }
}
