<?php

namespace App\Http\Controllers;

use Aunth;

use Illuminate\Support\Facades\Auth;

use DB;

use Carbon\Carbon;

use Illuminate\Http\Request;

use response;

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
        $idvehiculo = DB::table('concesiones')
        ->select('id_vehiculo')
        ->where('concesion', '=', $request->input('concesion'))
        ->first();

        if(is_null($idvehiculo)){
            return back();
        }

        $lkm = DB::table('kilometraje')
            ->select('kilometraje')
            ->orderBy('fecha_registro','desc')
            ->where('id_vehiculo','=', $idvehiculo->id_vehiculo)
            ->first();
            

        $id=null;
        $idconcesion = DB::table('concesiones')
        ->select('id')
        ->where('concesion', '=', $request->input('concesion'))
        ->first();                

        $cuo=null;
        $cont=0;
        $cuotas = DB::table('cuotas')
            ->select('cuotas.id')
            ->join('concesiones', 'cuotas.id_concesion', '=', 'concesiones.id')
            ->where('fecha_pago', '=', date('Y-m-d'))
            ->get();
        
        $res= json_decode($cuotas, true);
        foreach($res as $i => $v){
            $cuo = $v;       
        }
        


        if($cuo == null){
            DB::table('cuotas')->insert([
                'fecha_pago' => date('Y-m-d'),
                'status' => 'S/P',
                'id_concesion' => $idconcesion->id,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }

        $pagos = DB::table('cuotas')
                ->select('id', 'fecha_pago')
                ->where('status', '=', 'S/P')
                ->where('id_concesion', '=', $idconcesion->id)
                ->get();

        $banpago = null;
        $res = json_decode($pagos,true);
        foreach ($res as $i => $v) {
            $banpago = $v;
            $cont++;
        }

        
        
        $id= null;
        $idve = DB::table('concesiones')
            ->select("id_vehiculo")
            ->where('concesion', '=', $request->input('concesion'))
            ->get();
    

            $reportes = DB::table('reportes')
            ->select('reportes.fecha_accidente', 'reportes.descripcion', 'reportes.status', 'conductores.nombreconductor')
            ->join('conductores','reportes.id_conductor','=','conductores.id')
            ->where('id_concesion','=',$idconcesion->id)
            ->paginate(3);


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
            $concesion = DB::table('concesiones')
            ->where('concesion', '=', $request->input('concesion'))
            ->get();
            return view('ErrorConcesion', compact('concesion'));
        } else {
            $res = implode($id);
            
            return view('Concesion', compact('informaciones', 'idconcesion', 'pagos', 'cont', 'lkm', 'reportes'));
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
    public function update(Request $request, $concesion)
    {        

        if($concesion!=null){

            $datos = DB::table('concesiones')
            ->where('concesion',$concesion)
            ->first();

            DB::table('concesionarios')
            ->where('id',$datos->id_concesionario)
            ->update([
                "nombreconcesionario" => $request->input("nombreconcesionario"),
                "domicilioconcesionario" => $request->input("calleconcesionario"),
                "numExtconcesionario" => $request->input("numext"),
                "numIntconcesionario" => $request->input("numint"),
                "coloniaconcesionario" => $request->input("coloniaconcesion"),
                "cpconcesionario" => $request->input("cpconcesionario"),
                "municipioconcesionario" => $request->input("ciudadconcesionario"),
                "estadoconcesionario" => $request->input("estadoconcesionario"),
                "emailconcesionario" => $request->input("emailconcesionario"),
                "telefonoconcesionario" => $request->input("fijoconcesionario"),
                "celularconcesionario" => $request->input("cel1concesionario"),
                "celularconcesionario2" => $request->input("cel2concesionario"),
                "updated_at" => Carbon::now()
            ]);
        
            if($request->input("check") == 1){
                DB::table('concesionarios')
                ->where('id',$datos->id_concesionario)
                ->update([
                    "fotoconcesionario" => $request->file("fotoconcesionario")->store('public'),
                    "ineconcesionario" => $request->file("ineconcesionario")->store('public'),
                    "licenciaconcesionario" => $request->file("licenciaconcesionario")->store('public'),
                    "updated_at" => Carbon::now()
                ]);
            } 
            return redirect()->action('ConcesionesController@show', ['concesion' => $concesion]);
        }    
    }

    public function updateVehiculo(Request $request, $concesion){
        if($concesion!=null){
            $datos = DB::table('concesiones')
            ->where('concesion',$concesion)
            ->first();

            DB::table('vehiculos')
            ->where('id',$datos->id_vehiculo)
            ->update([
                "marca" => $request->input("marca"),
                "modelo" => $request->input("modelo"),
                "año_fabricacion" => $request->input("fabricacion"),
                "placa" => $request->input("placas"),
                "updated_at" => Carbon::now()
            ]);

            $taximetro = DB::table('vehiculos')
            ->where('id',$datos->id_vehiculo)
            ->first();

            $taxi = DB::table('taximetros')            
            ->where('id',$taximetro->id_taximentro)
            ->update([
                "marcatax" => $request->input("marcataximetro"),
                "modelotax" => $request->input("modelotaximetro"),
                "serietax" => $request->input("serietaximetro"),
                "idiot" => $request->input("iot"),
                "updated_at" => Carbon::now()
            ]);

            if($request->input("check2") == 1){
                DB::table('vehiculos')
                ->where('id',$datos->id_vehiculo)
                ->update([
                    "fotovehiculofrente" => $request->file("fotod")->store('public'),
                    "fotovehiculold" => $request->file("fotold")->store('public'),
                    "fotovehiculoli" => $request->file("fotoli")->store('public'),
                    "fotovehiculotrasera" => $request->file("fotot")->store('public'),
                    "fotoseguro" => $request->file("fotopoliza")->store('public'),
                    "fototarjeta" => $request->file("fototarjeta")->store('public'),
                    "updated_at" => Carbon::now()
                ]);                
            }

            return redirect()->action('ConcesionesController@show', ['concesion' => $concesion]);
        }
    }

    public function updateConductor(Request $request, $concesion){
        if($concesion!=null){
            $datos = DB::table('concesiones')
            ->where('concesion',$concesion)
            ->first();

            DB::table('conductores')
            ->where('id',$datos->id_conductor)
            ->update([
                "nombreconductor" => $request->input("nombreconductor"),
                "fecha_nacimiento" => $request->input('fecha_nacimiento'),
                "domicilioconductor" => $request->input("calleconductor"),
                "numExtconductor" => $request->input("extconductor"),
                "numIntconductor" => $request->input("intconductor"),
                "estadoconductor" => $request->input("estadoconductor"),
                "municipioconductor" => $request->input("ciudadconductor"),
                "coloniaconductor" => $request->input("coloniaconductor"),
                "cpconductor" => $request->input("cpconductor"),
                "emailconductor" => $request->input("emailconductor"),
                "telefonoconductor" => $request->input("fijoconductor"),
                "celularconductor" => $request->input("cel1conductor"),
                "celularconductor2" => $request->input("cel2conductor"),
                "updated_at" => Carbon::now()
            ]);
        

            if($request->input("check3") == 1){
                DB::table('conductores')
                ->where('id',$datos->id_conductor)
                ->update([
                    "fotoconductor" => $request->file("fotoconductor")->store('public'),
                    "ineconductor" => $request->file("ineconductor")->store('public'),
                    "licenciaconductor" => $request->file("licenciaconductor")->store('public'),
                    "updated_at" => Carbon::now()
                ]);
            }

            return redirect()->action('ConcesionesController@show', ['concesion' => $concesion]);
        }
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

    public function asignar(Request $request){
        $conductor = DB::table('conductores')
                    ->select('id')
                    ->where('nombreconductor', '=', $request->input('nombreconductor'))
                    ->where('emailconductor', '=', $request->input('email'))
                    ->first();
        if(!is_null($conductor)){
            dd($conductor);
        DB::table('concesiones')
        ->where('id', '=', $request->input('concesion'))
        ->update(["id_conductor" => $conductor->id]);

        return redirect()->action('ConcesionesController@show', ['concesion' => $request->input('concesion')]);
        }else{
            return view('home');
        }
    }

    public function viewRegConductor(){
        return view('regConductor');
    }

    public function regConductor(Request $request){
        DB::table('conductores') -> insert([
            "nombreconductor" => $request->input('nombreconductor'),
            "fecha_nacimiento" => $request->input('fecha_nacimiento'),
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

        return view('home');
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
            "fotovehiculofrente" => $request->file('fotod')->store('public'),
            "fotovehiculold" => $request->file('fotold')->store('public'),
            "fotovehiculoli" => $request->file('fotoli')->store('public'),
            "fotovehiculotrasera" => $request->file('fotot')->store('public'),
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
                "fecha_nacimiento" => $request->input('fecha_nacimiento'),
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

        $concesionario=null;
        $cont=0;
        $concesid = DB::table('concesionarios')
            ->select('id')
            ->where('nombreconcesionario', '=', $request->input('nombreconcesionario'))
            ->where('emailconcesionario', '=', $request->input('emailconcesionario'))
            ->get();
    
        $res= json_decode($concesid, true);
        foreach($res as $i => $v){
            $concesionario = $v;       
        }
        if ($concesionario == null) {
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
        }
        

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
                "pertenece" =>  Auth::user()->name,
                "id_vehiculo" => $idvehi,
                "id_concesionario" => $idcon,
                "id_conductor" => $idcond,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }else{
            DB::table('concesiones')->insert([
                "concesion" => $request->input('concesion'),
                "pertenece" => Auth::user()->name,
                "id_vehiculo" => $idvehi,
                "id_concesionario" => $idcon,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }
        

        return view('home');
    }


    public function updateKm(Request $request){
        $idvehiculo = DB::table('concesiones')
        ->select('id_vehiculo')
        ->where('concesion', '=', $request->input('concesion'))
        ->get();


        $idvehic = json_decode($idvehiculo,true);
        $id=null;
        foreach ($idvehic as $i => $v) {
            $id = $v;
        }

        if($id!=null){
            $id = implode($id);
            DB::table('kilometraje')->insert([
                "kilometraje" => $request->input("kilometraje"),
                "fecha_registro" => date("Y-m-d"),
                "id_vehiculo" => $id,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        
            return redirect()->action('ConcesionesController@show', ['concesion' => $request->input('concesion')]);
        }    
        
    }

    public function regReporte (Request $request){
        $idconcesion = DB::table('concesiones')
        ->select('id')
        ->where('concesion', '=', $request->input('concesion'))
        ->get();
        $res = json_decode($idconcesion, true);
        foreach ($res as $key => $value) {
            $idconcesion = $value;
        }
        $idconcesion = implode($idconcesion);


        $idconductor = DB::table('concesiones')
        ->select('id_conductor')
        ->where('concesion', '=', $request->input('concesion'))
        ->get();
        $res = json_decode($idconductor, true);
        foreach ($res as $key => $value) {
            $idconductor = $value;
        }
        $idconductor = implode($idconductor);

        $idvehiculo = DB::table('concesiones')
        ->select('id_vehiculo')
        ->where('concesion', '=', $request->input('concesion'))
        ->get();
        $res = json_decode($idvehiculo, true);
        foreach ($res as $key => $value) {
            $idvehiculo = $value;
        }
        $idvehiculo = implode($idvehiculo);


        DB::table('reportes')->insert([
            "fecha_accidente" => $request->input('date'),
            "descripcion" => $request->input('descripcion'),
            "status" => $request->input('estado'),
            "id_concesion" => $idconcesion,
            "id_conductor" => $idconductor,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        return redirect()->action('ConcesionesController@show', ['concesion' => $request->input('concesion')]);
    }

    public function pagar(Request $request){
        DB::table('cuotas')
        ->where('id', '=', $request->input('pagar'))
        ->update(['status'=>"pagado",'cuota'=>$request->input('cuota'),'otros'=>$request->input('otros')]);

        return redirect()->action('ConcesionesController@show', ['concesion' => $request->input('concesion')]);
        

        $idvehiculo = DB::table('concesiones')
        ->select('id_vehiculo')
        ->where('concesion', '=', $request->input('concesion'))
        ->get();
        $idvehic = json_decode($idvehiculo, true);
        $id=null;
        foreach ($idvehic as $i => $v) {
            $id = $v;
        }


        $id = implode($id);
        $lkm = DB::table('kilometraje')
            ->select('kilometraje')
            ->where('id_vehiculo', '=', $id)
            ->get();

        $res = json_decode($lkm, true);

        foreach ($res as $key => $value) {
            $lkm = $value;
        }

        $lkm = implode($lkm);
        
        $id=null;
        $concesion = DB::table('concesiones')
        ->select('id')
        ->where('concesion', '=', $request->input('concesion'))
        ->get();

        $idconcesion = json_decode($concesion, true);
        foreach ($idconcesion as $i => $v) {
            $id = $v;
        }

        if ($id != null) {
            $idconcesion = implode($id);
        }
        

        $cuo=null;
        $cont=0;
        $cuotas = DB::table('cuotas')
            ->select('cuotas.id')
            ->join('concesiones', 'cuotas.id_concesion', '=', 'concesiones.id')
            ->where('fecha_pago', '=', date('Y-m-d'))
            ->get();
        
        $res= json_decode($cuotas, true);
        foreach($res as $i => $v){
            $cuo = $v;       
        }
        


        if($cuo == null){
            DB::table('cuotas')->insert([
                'fecha_pago' => date('Y-m-d'),
                'status' => 'S/P',
                'id_concesion' => $idconcesion,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }

        $pagos = DB::table('cuotas')
                ->select('id', 'fecha_pago')
                ->where('status', '=', 'S/P')
                ->where('id_concesion', '=', $idconcesion)
                ->get();

        $banpago = null;
        $res = json_decode($pagos,true);
        foreach ($res as $i => $v) {
            $banpago = $v;
            $cont++;
        }

        
        
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

        $reportes = DB::table('reportes')
        ->select('reportes.fecha_accidente', 'reportes.descripcion', 'reportes.status', 'conductores.nombreconductor')
        ->join('conductores','reportes.id_conductor','=','conductores.id')
        ->where('id_concesion','=',$idconcesion)
        ->paginate(3);

        
        if ($id == null) {
            $concesion = DB::table('concesiones')
            ->where('concesion', '=', $request->input('concesion'))
            ->get();
            return view('ErrorConcesion', compact('concesion'));
        } else {

            return redirect()->back();
            
            $res = implode($id);
            return view('Concesion', compact('informaciones', 'pagos', 'cont', 'lkm', 'reportes'));
        }

    }
}
