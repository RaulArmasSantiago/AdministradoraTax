@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @foreach($informaciones as $informacion)
                    
                <div class="card-header">Concesion <b>{{ $informacion->concesion }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="card border-dark" style="height: 23rem;">
                                <div class="card-header bg-warning text-black">Concesionario</div>
                                <div class="card-body">
                                    <h5 class="card-title tex-center "><strong>{{ $informacion->nombreconcesionario }}</strong></h5>
                                    <strong>Dirección:</strong><br>
                                    {{ $informacion->domicilioconcesionario }} 
                                    @if($informacion->numExtconcesionario!=null)
                                        # {{ $informacion->numExtconcesionario }}
                                    @else
                                        S/N
                                    @endif
                                    @if ($informacion->numIntconcesionario!=null)
                                        Int. {{ $informacion->numIntconcesionario }}
                                    @endif
                                    @if ($informacion->coloniaconcesionario!=null)
                                       <strong>Col.</strong> {{ $informacion->coloniaconcesionario }} 
                                    @else
                                        S/C
                                    @endif<br>
                                   <strong>C.P.</strong> {{ $informacion->cpconcesionario }}
                                   <br>
                                   {{ $informacion->municipioconcesionario }}, {{ $informacion->estadoconcesionario }}
                                    <br>
                                   <strong>Contacto:</strong><br>
                                   {{ $informacion->emailconcesionario }} <br>
                                   Telefono fijo: {{ $informacion->telefonoconcesionario }} <br>
                                   Celular: {{ $informacion->celularconcesionario }} <br>
                                   Celular Alternativo: {{ $informacion->celularconcesionario2 }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-dark" style="height: 23rem;">
                                <div class="card-header bg-warning text-black">Conductor</div>
                                <div class="card-body" id="tamaño">
                                    <h5><strong>{{ $informacion->nombreconductor }}</strong></h5>
                                    <strong>Dirección:</strong><br>
                                    {{ $informacion->domicilioconductor }} 
                                    @if($informacion->numExtconductor!=null)
                                        # {{ $informacion->numExtconductor }}
                                    @else
                                        S/N
                                    @endif
                                    @if ($informacion->numIntconductor!=null)
                                        Int. {{ $informacion->numIntconductor }}
                                    @endif
                                    @if ($informacion->coloniaconductor!=null)
                                       <strong>Col.</strong> {{ $informacion->coloniaconductor }} 
                                    @else
                                        S/C
                                    @endif<br>
                                   <strong>C.P.</strong> {{ $informacion->cpconductor }}
                                   <br>
                                   {{ $informacion->municipioconductor }}, {{ $informacion->estadoconductor }}
                                    <br>
                                   <strong>Contacto:</strong><br>
                                   {{ $informacion->emailconductor }} <br>
                                   Telefono fijo: {{ $informacion->telefonoconductor }} <br>
                                   Celular: {{ $informacion->celularconductor }} <br>
                                   Celular Alternativo: {{ $informacion->celularconductor2 }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-dark" style="height: 23rem;">
                                <div class="card-header bg-warning text-black">Vehiculo</div>
                                <div class="card-body" id="tamaño">
                                    <strong>Marca:</strong> {{ $informacion->marca }} <br>
                                    <strong>Modelo: </strong> {{ $informacion->modelo }} <br>
                                    <strong>Año de Fabricación: </strong> {{ $informacion->año_fabricacion }} <br><br>
                                    <h5 class="text-warning text-center">Taximetro</h5>
                                    <strong>Marca:</strong> {{ $informacion->marcatax }}<br>
                                    <strong>Modelo:</strong> {{ $informacion->modelotax }}<br>
                                    <strong>Numero de Serie:</strong> {{ $informacion->serietax }}<br>
                                </div>
                            </div>
                        </div>
                    </div>
<br><br>
                    <div class="row show-grid">
                        <div class="col-md-4 text-center">
                            @if($cont == 0)
                                <a href="#" class="create-modal btn btn-secondary">Pagar</a><br>
                                <label >Pagos al día</label>
                            @else
                                @if($cont == 1)
                                    <a href="#" class="create-modal btn btn-success">Pagar</a><br>
                                    <label class="text-success">Debe el pago de hoy</label>
                                @else
                                    @if($cont == 2)
                                    <a href="#" class="create-modal btn btn-warning">Pagar</a><br>
                                    <label class="text-warning">1 PAGO ATRASADO</label>
                                    @else
                                    <a href="#" class="create-modal btn btn-danger">Pagar</a><br>
                                    <label class="text-danger">{{ $cont-1 }} PAGOS ATRASADO</label>
                                    @endif
                                @endif
                            @endif
                            
                        </div>

                        <div class="col-md-4">

                        </div>

                        <div class="col-md-4 text-center">
                            <img src="{{ Storage::url($informacion->fotovehiculo) }}" width="300" class="img-thumbnail">
                        </div>
                    </div>
                    
                </div>         
                @endforeach
               
                </div>
                     
            </div>
        </div>
    </div>
</div>

{{-- Modal Form Create Post --}}

<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Fecha de adeudo</th>
                            <th>Cuota</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagos as $pago )
                        <form action="pagar" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                            <tr>
                                <input type="hidden" name="concesionn" value="{{ $informacion->concesion }}">
                                <input type="hidden" name="pagar" value="{{ $pago->id }}">                               
                                <td>{{ $pago->fecha_pago }}</td>
                                <td>
                                    $ 350.00
                                </td>
                                <td><button type="submit" id="pagar" class="btn btn-yellow">Pagar</button></td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning" type="button" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remobe"></span>Close
                </button>
            </div>
        </div>
    </div>
</div> 
@endsection

