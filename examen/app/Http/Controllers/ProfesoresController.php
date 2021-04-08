<?php

namespace App\Http\Controllers;

use App\Models\profesore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profesores=DB::select('select * from profesores');
        return view('profesores.index',['profesores' => $profesores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('profesores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $DNI=$request->get('dni');
        $nombre=$request->get('nombre');
        $apellido=$request->get('apellido');
        $direccion=$request->get('direccion');
        $titulo=$request->get('titulo');
        $telefono=$request->get('telefono');
        DB::Insert('insert into profesores(dni, nombre, apellido, direccion, titulo, telefono) values (?, ?, ?, ?, ?,?)',[$DNI,$nombre,$apellido, $direccion,$titulo,$telefono]);
        return redirect('/profesores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($DNI)
    {
        //
        $profesores= profesore::find($DNI);
        return view('profesore.edit')->with('profesores',$profesores);
        return redirect('/profesores');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $DNI)
    {
        //
         // $articulos= Articulo::find($id);
        // $articulos->codigo = $request->get('codigo');
        // $articulos->descripcion = $request->get('descripcion');
        // $articulos->cantidad = $request->get('cantidad');
        // $articulos->precio = $request->get('precio');
    //     // $articulos->save();



         $profesores= profesore::find($DNI);
        $DNI=$request->get('dni');
        $nombre=$request->get('nombre');
        $apellido=$request->get('apellido');
        $direccion=$request->get('direccion');
        $titulo=$request->get('titulo');
        $telefono=$request->get('telefono');
        DB:: update('update profesores set nombre=?, apellido=?, direccion=?, titulo=?, telefono=? where dni=?', [$nombre,$apellido,$direccion,$titulo,$telefono,$DNI]);
        return redirect('/profesores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $profesores=profesore::find($id);
        $profesores->delete();
        return redirect('/profesores');
    }
}
