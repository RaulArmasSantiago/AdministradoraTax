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
                        <div class="col-md-3">
                            <div class="card border-dark" style="height: 24rem;">
                                <div class="card-header bg-warning text-black"><b><label style="font-size: 1.2em"> Concesionario</label></b></div>
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
                                   <br>
                                   <a onclick="printDiv('pineconductor')" href="">
                                    <img src="img/ine.png" alt="" width="23x" class="img-thumbnail">
                                   </a>
                                   &nbsp;
                                   <a onclick="printDiv('plicenciaconductor')" href="">
                                    <img src="img/licensia.png" alt="" width="23px" class="img-thumbnail">
                                   </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-dark" style="height: 24rem;">
                                <div class="card-header bg-warning text-black"><b><label style="font-size: 1.2em"> Conductor</label></b></div>
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
                                    <br>
                                   <a onclick="printDiv('pineconductor')" href="">
                                    <img src="img/ine.png" alt="" width="23px" class="img-thumbnail">
                                   </a>
                                   &nbsp;
                                   <a onclick="printDiv('plicenciaconductor')" href="">
                                    <img src="img/licensia.png" alt="" width="23px" class="img-thumbnail">
                                   </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card border-dark" style="height: 24rem;">
                                <div class="card-header bg-warning text-black"><b><label style="font-size: 1.2em"> Vehiculo</label></b></div>
                                <div class="card-body" id="tamaño">
                                    <strong>Marca:</strong> {{ $informacion->marca }} <br>
                                    <strong>Modelo: </strong> {{ $informacion->modelo }} <br>
                                    <strong>Año de Fabricación: </strong> {{ $informacion->año_fabricacion }} <br><br>
                                    <h5 class="text-warning text-center">Taximetro</h5>
                                    <strong>Marca:</strong> {{ $informacion->marcatax }}<br>
                                    <strong>Modelo:</strong> {{ $informacion->modelotax }}<br>
                                    <strong>Numero de Serie:</strong> {{ $informacion->serietax }}<br><br><br>
                                    <a href="" onclick="printDiv('ptarjeta')">
                                        <img src="img/icono_grabado_tissa_03.png" alt="" height="24px">
                                    </a>
                                    <a href="" onclick="printDiv('ppoliza')">
                                        <img src="img/poliza.jpg" alt="" height="24px">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                                <div class="card border-dark" style="height: 24rem;">
                                    <div class="card-header bg-warning text-black"><b><label style="font-size: 1.2em"> Siniestros</label></b></div>
                                    <div class="card-body" id="tamaño">
                                    <table class="table table-striped table-sm table-responsive" style="">
                                        <thead class="table-dark">
                                            <tr>
                                                <th id="td">Fecha</th>
                                                <th id="td" style="width:10px">Descripcion</th>
                                                <th id="td">Status</th>
                                                <th id="td">Responsable</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reportes as $reporte)
                                                @if ($reporte->status == 'Reportada')
                                                    <tr class="table-danger">
                                                @endif
                                                @if ($reporte->status == 'En Reparacion')
                                                    <tr class="table-warning">
                                                @endif
                                                @if ($reporte->status == 'Reparado')
                                                    <tr class="table-success">
                                                @endif
                                                
                                                    <td id="td">{{ $reporte->fecha_accidente }}</td>
                                                    <td id="td" style="width:100%">{{ $reporte->descripcion }}</td>
                                                    <td id="td">{{ $reporte->status }}</td>
                                                    <td id="td">{{ $reporte->nombreconductor }}</td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>

                                    </table>
                                    <input type="hidden" name="concesion" value="{{ $informacion->concesion }}">
                                    {{ $reportes->appends(request()->input())->links() }}
                                </div>
                            </div>
                        </div>
                        
                    </div>
<br><br>
                    <div class="row show-grid">
                        <div class="col-md-3 text-center">
                            @if($cont == 0)
                                <a href="#" class="create-modal btn btn-secondary btn-block" style="height:90px"><label style="font-size:5em"> Pagar </label></a><br>
                                <label >Pagos al día</label>
                            @else
                                @if($cont == 1)
                                    <a href="#" class="create-modal btn btn-success btn-block" style="height:100px"><label style="font-size:7em"> Pagar </label></a><br>
                                    <label class="text-success">Debe el pago de hoy</label>
                                @else
                                    @if($cont == 2)
                                    <a href="#" class="create-modal btn btn-warning bbtn-block" style="height:100px"><label style="font-size:7em"> Pagar </label></a><br>
                                    <label class="text-warning">1 PAGO ATRASADO</label>
                                    @else
                                    <a href="#" class="create-modal btn btn-danger btn-block" style="height:100px"><label style="font-size:7em"> Pagar </label></a><br>
                                    <label class="text-danger">{{ $cont-1 }} PAGOS ATRASADO</label>
                                    @endif
                                @endif
                            @endif
                            
                        </div>

                        <div class="col-md-2 text-center">
                            <form action="updateKm" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="concesion" value="{{ $informacion->concesion }}">
                                    <label for="">Ultimo Kilometraje registrado:</label><br>
                                    @if ($lkm != null )
                                    <label>{{ $lkm }}</label>
                                    @endif
                                    


                                <div class="form-group">
                                    
                                    <label for="km" class="sr-only">Kilometraje:</label>
                                    <input type="text" name="kilometraje" id="km" placeholder="Kilometraje actual del vehiculo" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" size="45" align="">
                                </div>
                                <button type="submit" class="btn btn-yellow">Actualizar</button>
                            </form>
                        </div>
                        
                        <div class="col-md-3 text-right">
                            <form action="regReporte" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="concesion" value="{{ $informacion->concesion }}">
                                <div class="form-group">
                                    <label for="fecha" class="sr-only">Fecha del siniestro</label>
                                    <input type="date" name="date" id="fecha" class="form-control" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion" class="sr-only">Descripción del siniestro</label>
                                    <textarea name="descripcion" id="descripcion" cols="45" class="form-control" rows="5" placeholder="Descripción del siniestro"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="estado" class="sr-only">Estado del daño</label>
                                    <select name="estado" class="form-control" id="estado">
                                        <option value="">-- Selecciona el estado del daño --</option>
                                        <option value="Reportada">Reportada</option>
                                        <option value="En Reparacion">En Reparacion</option>
                                        <option value="Reparado">Reparado</option>
                                    </select>
                                </div>
                                <input type="submit" value="Levantar Reporte" class="btn btn-danger">
                            </form>
                        </div>

                        <div class="col-md-4 text-center">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel" data-slide-to="1"></li>
                                    <li data-target="#carousel" data-slide-to="2"></li>
                                    <li data-target="#carousel" data-slide-to="3"></li>
                                    <li data-target="#carousel" data-slide-to="4"></li>
                                </ol>

                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="{{ Storage::url($informacion->fotovehiculofrente) }}" alt="" width="500px" height="200px">
                                        <div class="carousel-caption">
                                            FOTO DE FRENTE
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ Storage::url($informacion->fotovehiculold) }}" alt="" width="500px">
                                        <div class="carousel-caption">
                                            FOTO LATERAL
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ Storage::url($informacion->fotovehiculoli) }}" alt="" width="500px">
                                        <div class="carousel-caption">
                                            FOTO LATERAL
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ Storage::url($informacion->fotovehiculotrasera) }}" alt="" width="500px">
                                        <div class="carousel-caption">
                                            FOTO TRASERA
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ Storage::url($informacion->fotoconductor) }}" alt="" width="500px">
                                        <div class="carousel-caption">
                                            Condutor
                                        </div>
                                    </div>
                                </div>
                                <a href="#carousel" class="left carousel-control" data-slide="prev">
                                    <i class="glyphicon glyphicon-chevron-left"></i>
                                </a>
                                <a href="#carousel" class="right carousel-control" data-slide="next">
                                    <i class="glyphicon glyphicon-chevron-right"></i>
                                </a>
                            </div>


                            
                        </div>
                    </div>
                    
                </div>         
                @endforeach
               
                </div>
                     
            </div>
        </div>
    </div>
</div>

<div class="hidden text-center" id="pineconductor">
    <img src="{{ Storage::url($informacion->ineconductor) }}" alt="" width="500px">
</div>

<div class="hidden text-center" id="plicenciaconductor">
    <center>
    <img src="{{ Storage::url($informacion->licenciaconductor) }}" alt="" width="500px">
    </center>
</div>

<div class="hidden text-center" id="ptarjeta">
    <center>
    <img src="{{ Storage::url($informacion->fototarjeta) }}" alt="" width="500px">
    </center>
</div>

<div class="hidden text-center" id="ppoliza">
    <center>
    <img src="{{ Storage::url($informacion->fotoseguro) }}" alt="">
    </center>
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
                            <th>Otros</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagos as $pago )
                        <form action="pagar" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                            <tr>
                                <input type="hidden" name="concesion" value="{{ $informacion->concesion }}">
                                <input type="hidden" name="pagar" value="{{ $pago->id }}">                               
                                <td><label for="">{{ $pago->fecha_pago }}</label></td>
                                <td>
                                    <div class="form-group form-inline">
                                        <label for="">$</label>&nbsp;
                                        <label for="cuota" class="sr-only">Cuota:</label>
                                        <input type="text" name="cuota" id="cuota" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group form-inline">
                                        <label for="">$</label>&nbsp;
                                        <label for="otros" class="sr-only">Otros pagos:</label>
                                        <input type="text" name="otros" id="otros" class="form-control">
                                    </div>
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

