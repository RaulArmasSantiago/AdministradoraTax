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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
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

        return view('home');
    }
}
