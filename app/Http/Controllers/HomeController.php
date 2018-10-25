<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    function obtenerFechaEnLetra($fecha){
        $dia= conocerDiaSemanaFecha($fecha);
        $num = date("j", strtotime($fecha));
        $anno = date("Y", strtotime($fecha));
        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
        return $dia.', '.$num.' de '.$mes.' del '.$anno;
    }
     
    function conocerDiaSemanaFecha($fecha) {
        $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
        $dia = $dias[date('w', strtotime($fecha))];
        return $dia;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        function obtenerFechaEnLetra($fecha){
            $dia= conocerDiaSemanaFecha($fecha);
            $num = date("j", strtotime($fecha));
            $anno = date("Y", strtotime($fecha));
            $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
            $mes = $mes[(date('m', strtotime($fecha))*1)-1];
            return $dia;
        }
         
        function conocerDiaSemanaFecha($fecha) {
            $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
            $dia = $dias[date('w', strtotime($fecha))];
            return $dia;
        }
        /*
        $fecha_actual = date('Y-m-d');
        $string = date("Y-m-d",strtotime($fecha_actual."+ 1 days"));
        $letra = obtenerFechaEnLetra($string);
        return $letra;*/

        $id = DB::table('concesiones')
        ->select('id')
        ->get();

        $idconcesion = null;

        $res = json_decode($id, true);

        foreach( $res as $i => $v){
            $idconcesion = $v;
            if ($idconcesion != null) {
                $idconcesion = implode($idconcesion);
                $cuotas=null;
                $cuota = DB::table('cuotas')
                ->select("cuotas.id")
                ->join("concesiones", 'concesiones.id', '=', 'cuotas.id_concesion')
                ->where('fecha_pago', '=', date("Y-m-d"))
                ->where('id_concesion', '=', $idconcesion)
                ->get();

                $iduota = null;
                $res2 = json_decode($cuota);

                foreach($res2 as $i => $v){
                    $iduota = $v;
                }

                if($iduota == null){
                    DB::table('cuotas')->insert([
                        'fecha_pago' => date('Y-m-d'),
                        'status' => 'S/P',
                        'id_concesion' => $idconcesion,
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now(),
                    ]);
                }
            }
        }

        $fecha_actual = date('Y-m-d');
        
        $letra = obtenerFechaEnLetra($fecha_actual);
        if($letra == "Sábado"){
            $id = DB::table('concesiones')
        ->select('id')
        ->get();

        $idconcesion = null;

        $res = json_decode($id, true);

        foreach( $res as $i => $v){
            $idconcesion = $v;
            if ($idconcesion != null) {
                $idconcesion = implode($idconcesion);
                $cuotas=null;
                $cuota = DB::table('cuotas')
                ->select("cuotas.id")
                ->join("concesiones", 'concesiones.id', '=', 'cuotas.id_concesion')
                ->where('fecha_pago', '=', date("Y-m-d",strtotime($fecha_actual."+ 1 days")))
                ->where('id_concesion', '=', $idconcesion)
                ->get();

                $iduota = null;
                $res2 = json_decode($cuota);

                foreach($res2 as $i => $v){
                    $iduota = $v;
                }

                if($iduota == null){
                    DB::table('cuotas')->insert([
                        'fecha_pago' => date("Y-m-d",strtotime($fecha_actual."+ 1 days")),
                        'status' => 'S/P',
                        'id_concesion' => $idconcesion,
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now(),
                    ]);
                }
            }
        }
        }

        return view('home');
    }
}
