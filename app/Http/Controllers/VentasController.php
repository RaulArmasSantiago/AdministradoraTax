<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use response;


class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ventas = DB::table('ventas')
        ->where('fecha_venta','=',date('Y-m-d'))
        ->orderBy('folio','asc')
        ->get();

        return view('ventas',compact('ventas'));
    }


    public function addVenta(Request $request){

        DB::table('ventas')->insert([
            "producto" => $request->input('producto'),
            "cantidad" => $request->input('cantidad'),
            "total" => $request->input('total'),
            "folio" => $request->input('folio')
        ]);

        return redirect()->action('VentasController@index');
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
    public function show(Request $request)
    {
        //
        $fechas ="Reporte entre ".$request->input("rango1")." a ".$request->input("rango2");
        $ventas = DB::table('ventas')
        ->whereBetween('fecha_venta', [$request->input("rango1"), $request->input("rango2")])
        ->get();

        return view('ventas', compact('ventas'));
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
