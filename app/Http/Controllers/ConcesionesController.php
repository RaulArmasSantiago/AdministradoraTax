<?php

namespace App\Http\Controllers;

use DB;

use Carbon\Carbon;

use Illuminate\Http\Request;

class ConcesionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $con = mysqli_connect('localhost', 'root', '123456');
        mysqli_select_db($con, 'administradora');
        $sql="SELECT id FROM taximetros where serie='b'";
        $result= mysqli_query($con, $sql);
        $row = mysqli_fetch_row($result);



        return $row[0];       
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
        $id= null;
        $idve = DB::table('concesiones')
            ->select("id_vehiculo")
            ->where('concesion', '=', $request->input('concesion'))
            ->get();
    
        $informaciones = DB::table("concesiones")
                        ->join("concesionarios", 'concesionarios.id', '=', 'concesiones.id_concesionario')
                        ->join("vehiculos", 'vehiculos.id', '=', 'concesiones.id_vehiculo')
                        ->join("taximetros", 'taximetros.id', '=', 'vehiculos.id_taximentro')
                        ->join("conductores", 'conductores.id', '=', 'concesiones.id_conductor')
                        ->where('concesion', '=', $request->input('concesion'))
                        ->get();

        $res = json_decode($informaciones, true);
        //return $res;
        foreach ($res as $i => $v){
            $id=$v;
        }
        if ($id == null) {
            return view('ErrorConcesion');
        } else {
            $res = implode($id);
            return view('Concesion', compact('informaciones'));
        }
        
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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

    public function verRegistro(){
        return view('newConcesion');
    }

    public function viewRegConductor(){
        return view('regConductor');
    }

    public function registrar(Request $request){

        
        
        DB::table('taximetros') ->insert([
            "marcatax"=> $request->input('marcataximetro'),
            "modelotax"=> $request->input('modelotaximetro'),
            "serietax"=> $request->input('serietaximetro'),
            "idiot"=> $request->input('iot'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        
        $idtaximetro = DB::table('taximetros')
            ->select('id')
            ->where("serietax", "=", $request->input('serietaximetro'))
            ->get();


        $idtax = json_decode($idtaximetro, true);

        foreach($idtax as $i => $v){
            $id=$v;
        }
        
        $idtax = implode($id);

        DB::table('vehiculos')->insert([
            "marca" => $request->input('marca'),
            "modelo" => $request->input('modelo'),
            "año_fabricacion" => $request->input('fabricacion'),
            "placa" => $request->input('placas'),
            "fotovehiculo" => $request->file('fototaxi')->store('public'),
            "fotoseguro" => $request->file('fotopoliza')->store('public'),
            "fototarjeta" => $request->file('fototarjeta')->store('public'),
            "id_taximentro" =>  $idtax,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        $vehiculo= DB::table('vehiculos')
        ->select('id')
        ->where('id_taximentro', '=', $idtax)
        ->get();

        $idvehi = json_decode($vehiculo, true);

        foreach($idvehi as $i => $v){
            $id = $v;
        }

        $idvehi = implode($id);

        DB::table('kilometraje')->insert([
            "kilometraje" => $request->input('kilometraje'),
            "fecha_registro" => $request->input('fecha'),
            "id_vehiculo" => $idvehi,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        if($request->input('check') == 1) {
            DB::table('conductores') -> insert([
                "nombreconductor" => $request->input('nombreconductor'),
                "domicilioconductor" => $request->input('calleconductor'),
                "numExtconductor" => $request->input('extconductor'),
                "numIntconductor" => $request->input('intconductor'),
                "estadoconductor" => $request->input('estadoconductor'),
                "municipioconductor" => $request->input('ciudadconductor'),
                "coloniaconductor" => $request->input('coloniaconductor'),
                "cpconductor" => $request->input('cpconductor'),
                "emailconductor" => $request->input('emailconductor'),
                "telefonoconductor" => $request->input('fijoconductor'),
                "celularconductor" => $request->input('cel1conductor'),
                "celularconductor2" => $request->input('cel2conductor'),
                "fotoconductor" => $request->file('fotoconductor')->store('public'),
                "ineconductor" => $request->file('ineconductor')->store('public'),
                "licenciaconductor" => $request->file('licenciaconductor')->store('public'),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);

            $idconductor = DB::table("conductores")
            ->select('id')
            ->where('nombreconductor', '=', $request->input('nombreconductor'))
            ->get();
            
            $idcond = json_decode($idconductor, true);

            foreach($idcond as $i => $v){
                $id=$v;
            }
        
            $idcond = implode($id);
        }

        DB::table('concesionarios')->insert([
            "nombreconcesionario" => $request->input('nombreconcesionario'),
            "domicilioconcesionario" => $request->input('calleconcesionario'),
            "numExtconcesionario" => $request->input('numext'),
            "numIntconcesionario" => $request->input('numint'),
            "estadoconcesionario" => $request->input('estadoconcesionario'),
            "municipioconcesionario" => $request->input('ciudadconcesionario'),
            "coloniaconcesionario" => $request->input('coloniaconcesion'),
            "cpconcesionario" => $request->input('cpconcesionario'),
            "emailconcesionario" => $request->input('emailconcesionario'),
            "telefonoconcesionario" => $request->input('fijoconcesionario'),
            "celularconcesionario" => $request->input('cel1concesionario'),
            "celularconcesionario2" => $request->input('cel2concesionario'),
            "fotoconcesionario" => $request->file('fotoconcesionario') -> store('public'),
            "ineconcesionario" => $request->file('ineconcesionario') -> store('public'),
            "licenciaconcesionario" => $request->file('licenciaconcesionario') -> store('public'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        $idconcesionario = DB::table('concesionarios')
        ->select('id')
        ->where('nombreconcesionario', '=', $request -> input('nombreconcesionario'))
        ->get();

        $idcon = json_decode($idconcesionario, true);

        foreach ($idcon as $i => $v){
            $id = $v;
        }

        $idcon = implode($id);

        if($request->input('check') == 1){
            DB::table('concesiones')->insert([
                "concesion" => $request->input('concesion'),
                "id_vehiculo" => $idvehi,
                "id_concesionario" => $idcon,
                "id_conductor" => $idcond,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }else{
            DB::table('concesiones')->insert([
                "concesion" => $request->input('concesion'),
                "id_vehiculo" => $idvehi,
                "id_concesionario" => $idcon,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }
        

        return view('home');
    }
}
