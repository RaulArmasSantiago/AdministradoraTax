<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use response;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $superficie = DB::table('inventario')
        ->orderBy('producto','asc')
        ->where('categoria','=','Montaje Superficial')
        ->get();

        $through = DB::table('inventario')
        ->orderBy('producto','asc')
        ->where('categoria','=','Through-Hole')
        ->get();

        $inventario = DB::table('inventario')
        ->orderBy('producto','asc')
        ->where('categoria','=','General')
        ->get();

        return view("inventario", compact('through','superficie','inventario'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function minusProduct(Request $request){
        DB::table('inventario')
        ->where('id','=',$request->input('id'))
        ->decrement('cantidad');
        return redirect()->action('InventarioController@index');
    }

    public function plusProduct(Request $request){
        DB::table('inventario')
        ->where('id','=',$request->input('id'))
        ->increment('cantidad');
        return redirect()->action('InventarioController@index');
    }

    public function addProduct(Request $request){
        DB::table('inventario')->insert([
            "producto"=> $request->input("name"),
            "descripcion" => $request->input("description"),
            "categoria" => $request->input("categoria"),
            "cantidad" => $request->input("cantidad")
        ]);

        return redirect()->action('InventarioController@index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
