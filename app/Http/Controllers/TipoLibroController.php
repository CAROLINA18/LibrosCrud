<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Repositories;
use App\tipo_libro;
use DB;
use App\Http\Requests\StoreTipoLibroRequest;
use App\Repositories\TipoLibroRepository;


class TipoLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libros=tipo_libro::orderBy('id','DESC')->get();
        return view('tipo_libro.index',compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipo_libro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoLibroRequest $request , TipoLibroRepository $TipoLibroRepository)
    {
        $libro = $TipoLibroRepository->crear($request);
        return redirect()->route('tipo_libro.index')->with('success','Registro creado satisfactoriamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoLibroRepository $TipoLibroRepository , $id)
    {  
        //return response()->json($libroRepository->editar($id));
        $libro= $TipoLibroRepository->editar($id);
        //var_dump($libro);
        return view('tipo_libro.edit',compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTipoLibroRequest $request , TipoLibroRepository $TipoLibroRepository, $id)    {
        
        $libro = $TipoLibroRepository->actualizar($request,$id);
        return redirect()->route('tipo_libro.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoLibroRepository $TipoLibroRepository ,$id)
    {
        $libro= $TipoLibroRepository->eliminar($id);
        return redirect()->route('tipo_libro.index')->with('success','Registro eliminado satisfactoriamente');
    }
}