<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Repositories;
use App\Libro;
use App\tipo_libro;
use DB;
use App\Http\Requests\StoreLibroRequest;
use App\Repositories\LibroRepository;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libros=DB::select( 'CALL get_libros()');
        return view('Libro.index',compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipo_libros = tipo_libro::orderBy('id','DESC')->get();
        return view('Libro.create',compact('tipo_libros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibroRequest $request , LibroRepository $libroRepository)
    {
        $libro = $libroRepository->crear($request);
        return redirect()->route('libro.index')->with('success','Registro creado satisfactoriamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LibroRepository $libroRepository , $id)
    {  
        //return response()->json($libroRepository->editar($id));
        $tipo_libros = tipo_libro::orderBy('id','DESC')->get();
        $libro= $libroRepository->editar($id);
        //dd($libro[0]->id);
        return view('libro.edit',compact('libro','tipo_libros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLibroRequest $request , LibroRepository $libroRepository, $id)    {

        
        $libro = $libroRepository->actualizar($request,$id);
        return redirect()->route('libro.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LibroRepository $libroRepository ,$id)
    {
        $libro= $libroRepository->eliminar($id);
        return redirect()->route('libro.index')->with('success','Registro eliminado satisfactoriamente');
    }
}