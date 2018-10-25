@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 letra-grande">
            <div class="card">
                <div class="card-header">Registro de ventas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form action="addVenta" method="post">
                            <h4>Datos del cliente</h4>
                            <hr>
                            <div class="form-group">
                                <label for="nombre" class="sr-only">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">E-mail</label>
                                <input class="form-control" type="text" name="email" id="email" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <label for="taximetro" class="sr-only">Taximetro</label>
                                <input class="form-control" type="text" name="taximetro" id="taximetro" placeholder="Taximetro">
                            </div>
                            <div class="form-group form-inline">
                                <label for="vehiculo" class="sr-only">Vehiculo</label>
                                <input class="form-control" type="text" name="vehiculo" id="vehiculo" placeholder="Vehiculo" size="43">
                                <label for="placa" class="sr-only">Placa</label>
                                <input class="form-control ml-4" type="text" name="vehiculo" id="placa" placeholder="Placa" size="43">
                            </div>
                            <div class="form-group">
                                <label for="serie" class="sr-only">Serie</label>
                                <input class="form-control" type="text" name="serie" id="serie" placeholder="Serie">
                            </div>
                            <h4>Datos de la venta</h4>
                            <hr>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label for="producto" class="sr-only">Producto</label>
                                    <input class="form-control" type="text" name="producto" id="producto" placeholder="Producto">
                                </div>
                                <div class="form-group form-inline">
                                    <label for="cantidad" class="sr-only">Cantidad de la venta</label>
                                    <input class="form-control" type="text" name="cantidad" id="cantidad" placeholder="Cantidad vendida" size="43">
                                    <label for="total" class="sr-only">Total de la venta</label>
                                    <input class="form-control ml-4" type="text" name="total" id="total" placeholder="Total de la venta" size="43">
                                </div>
                                <div class="form-group">
                                    <label for="folio" class="sr-only">Folio de la venta</label>
                                    <input class="form-control" type="text" name="folio" id="folio" placeholder="Folio de la venta">
                                </div>
                                <input class="btn btn-danger btn-block letra-grande" type="submit" value="Registrar venta">
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-7 bigtxt">
            <div class="card">
                <div class="card-header">Reporte de ventas</div>
                <div class="card-body">
                    <form action="filtrarVentas" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <label for="">Filtrar</label>
                        <div class="form-group form-inline">
                            <input class="form-control bigtxt" type="date" name="rango1" id="rango1">
                            <input class="form-control ml-3 bigtxt" type="date" name="rango2" id="rango2">
                            <button class="btn btn-success bigtxt ml-4">Generar</button>
                        </div>
                    </form>
                    <br>
                    
                <table class="table table-striped table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Folio</th>
                            <th>Fecha de la venta</th>
                            <th>Producto</th>
                            <th>Cantidad vendida</th>
                            <th>Total de la venta</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventas as $v)
                            <tr>
                                <td>{{$v->folio}}</td>
                                <td>{{$v->fecha_venta}}</td>
                                <td>{{$v->producto}}</td>
                                <td>{{$v->cantidad}}</td>
                                <td>{{$v->total}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                
                </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection