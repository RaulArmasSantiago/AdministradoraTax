@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 letra-grande">
            <div class="card">
                <div class="card-header">Corte diario</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-6 text-center">
                            <form action="searchReporte" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <cite>Seleccione el rango para generar su reporte</cite>
                                <div class="form-inline form-group">
                                    <input class="form-control bigtxt" type="date" name="rango1" id="">&nbsp;a&nbsp;
                                    <input class="form-control bigtxt" type="date" name="rango2" id=""> &nbsp; <button class="btn btn-success bigtxt">Generar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-4 text-rigth">
                            <a href="" onclick="printDiv('preporte')"><label for=""> Imprimir</label> <img src="img/print-icon.png" alt="#"></a>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <br>
                        <div class="col-md-8 text-center" id="preporte">
                        <div class="card">
                            <div class="card-header">{{$fechas}}</div>
                            <div class="card-body">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>Concesion</th>
                                            <th>Dias pagados | Cuota | Otros</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($concesiones as $concesion)
                                        <tr>
                                            <td>{{$concesion->concesion}}</td>
                                            <td>
                                            @foreach($cortes as $corte)
                                                @if($corte->concesion == $concesion->concesion)
                                                {{$corte->fecha_pago}} | ${{$corte->cuota}} | ${{$corte->otros}}<br>
                                                @endif
                                            @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th>Total:</th>
                                            <th>
                                            ${{$total}}
                                            </th>
                                        </tr>
                                    </tbody>    
                                </table>
                            </div>
                        </div>
                             
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection