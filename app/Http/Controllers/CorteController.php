<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use response;

class CorteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fechas = "Resporte del día ".date('Y-m-d');
        $concesiones = DB::table('concesiones')
        ->orderBy('concesion','asc')
        ->get();

        $cortes = DB::table('concesiones')
        ->join('cuotas','cuotas.id_concesion','=','concesiones.id')
        ->where('fecha_cobro','=',date('Y-m-d'))
        ->orderBy('concesion','asc')
        ->get();


        $total = DB::table('cuotas')
        
        ->where('fecha_cobro','=',date('Y-m-d'))
        ->sum('cuota');

        $total = $total + DB::table('cuotas')
        
        ->where('fecha_cobro','=',date('Y-m-d'))
        ->sum('otros');

        return view('corte', compact('concesiones','cortes','total','fechas'));
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
        
        $concesiones = DB::table('concesiones')
        ->orderBy('concesion','asc')
        ->get();

        $cortes = DB::table('concesiones')
        ->join('cuotas','cuotas.id_concesion','=','concesiones.id')
        
        ->whereBetween('fecha_cobro', [$request->input("rango1"), $request->input("rango2")])
        ->orderBy('concesion','asc')
        ->get();


        $total = DB::table('cuotas')
        
        ->whereBetween('fecha_cobro', [$request->input("rango1"), $request->input("rango2")])
        ->sum('cuota');

        $total = $total + DB::table('cuotas')
        
        ->whereBetween('fecha_cobro', [$request->input("rango1"), $request->input("rango2")])
        ->sum('otros');

        return view('corte', compact('concesiones','cortes','total','fechas'));
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
