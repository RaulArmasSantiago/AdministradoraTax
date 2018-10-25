@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @foreach($informaciones as $informacion)
                    
                <div class="card-header bigtxt"><label> Concesion</label> <b><label>{{ $informacion->concesion }}</label></b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row show-grid">
                        <div class="col-md-3">
                            <div class="card border-dark" style="height: 38rem;">
                                <div class="card-header bg-warning text-black letra-grande"><b><label> Concesionario</label></b><a href="#" class="create-modal1 btn"><img src="img/edit-icon.png" alt=""></a> </div>
                                <div class="card-body bigtxt">
                                    <h4 class="card-title tex-center "><strong>{{ $informacion->nombreconcesionario }}</strong></h4>
                                    <strong>Dirección:</strong><br>
                                    <label>{{ $informacion->domicilioconcesionario }}</label>
                                    @if($informacion->numExtconcesionario!=null)
                                        <label># {{ $informacion->numExtconcesionario }}</label>
                                    @else
                                        <label>/N</label>
                                    @endif
                                    @if ($informacion->numIntconcesionario!=null)
                                        <label>Int: {{ $informacion->numIntconcesionario }}</label>
                                    @endif
                                    <br>
                                    @if ($informacion->coloniaconcesionario!=null)
                                       <strong>Col.</strong> <label>{{ $informacion->coloniaconcesionario }} </label>
                                    @else
                                       <label> S/C</label>
                                    @endif<br>
                                   <strong>C.P.</strong> <label>{{ $informacion->cpconcesionario }} &emsp; {{ $informacion->municipioconcesionario }}, {{ $informacion->estadoconcesionario }}</label>
                                    <br>
                                   <strong>Contacto:</strong><br>
                                   <label> Correo: {{ $informacion->emailconcesionario }}</label><br>
                                   <label> fijo: {{ $informacion->telefonoconcesionario }}</label> <br>
                                   <label> Celular: {{ $informacion->celularconcesionario }}</label><br>
                                   <label> Alternativo: {{ $informacion->celularconcesionario2 }}</label> <br>
                                   
                                   
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
                            <div class="card border-dark" style="height: 38rem;">
                                <div class="card-header bg-warning text-black letra-grande"><b><label> Conductor</label></b><a href="#" class="create-modal3 btn"><img src="img/edit-icon.png" alt=""></a></div>
                                <div class="card-body bigtxt" id="tamaño">
                                    <h3><strong>{{ $informacion->nombreconductor }}</strong></h3>
                                    <strong>Dirección:</strong><br>
                                    <label>{{ $informacion->domicilioconductor }} </label>
                                    @if($informacion->numExtconductor!=null)
                                    <label> # {{ $informacion->numExtconductor }}</label>
                                    @else
                                    <label> S/N</label>
                                    @endif
                                    @if ($informacion->numIntconductor!=null)
                                    <label style="font-size:1.em"> Int. {{ $informacion->numIntconductor }}</label>
                                    @endif
                                    @if ($informacion->coloniaconductor!=null)
                                       <strong>Col.</strong><label> {{ $informacion->coloniaconductor }} </label>
                                    @else
                                       <label> S/C</label>
                                    @endif<br>
                                   <strong>C.P.</strong><label> {{ $informacion->cpconductor }}</label>
                                   <br>
                                   <label> {{ $informacion->municipioconductor }}, {{ $informacion->estadoconductor }}</label>
                                    <br>
                                   <strong>Contacto:</strong><br>
                                   <label>{{ $informacion->emailconductor }}</label> <br>
                                   <label> fijo: {{ $informacion->telefonoconductor }}</label> <br>
                                   <label> {{ $informacion->celularconductor }}</label> <br>
                                   <label> Alternativo: {{ $informacion->celularconductor2 }}</label>
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
                            <div class="card border-dark" style="height: 38rem;">
                                <div class="card-header bg-warning text-black letra-grande"><b><label> Vehiculo</label></b><a href="#" class="create-modal2 btn"><img src="img/edit-icon.png" alt=""></a></div>
                                <div class="card-body bigtxt" id="tamaño">
                                    <strong>Marca:</strong><label> {{ $informacion->marca }}</label> <br>
                                    <strong>Modelo: </strong><label> {{ $informacion->modelo }}</label> <br>
                                    <strong>Año de Fabricación: </strong><label> {{ $informacion->año_fabricacion }}</label> <br><br>
                                    <h4 class="text-warning"><strong> Taximetro</strong></h4>
                                    <strong>Marca:</strong><label> {{ $informacion->marcatax }}</label><br>
                                    <strong>Modelo:</strong><label> {{ $informacion->modelotax }}</label><br>
                                    <strong>Num. de Serie:</strong><label> {{ $informacion->serietax }}</label><br>
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
                                <div class="card border-dark" style="height: 38rem;">
                                    <div class="card-header bg-warning text-black letra-grande"><b><label> Siniestros</label></b></div>
                                    <div class="card-body mdtxt" id="tamaño">
                                    <table class="table table-striped table-sm table-responsive">
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
                                <a href="#" class="create-modal btn-secondary btn-block" style="height:90px"><label style="font-size:5em"> Pagar </label></a><br>
                                <label>Pagos al día</label>
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
                                    <label class="text-danger mdtxt">{{ $cont-1 }} PAGOS ATRASADO</label>
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
                                    <label>{{ $lkm->kilometraje }}</label>
                                    @endif
                                    


                                <div class="form-group">
                                    
                                    <label for="km" class="sr-only">Kilometraje:</label>
                                    <input type="text" name="kilometraje" id="km" placeholder="Kilometraje actual del vehiculo" class="form-control mdtxt" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" size="45" align="">
                                </div>
                                <button type="submit" class="btn btn-yellow mdtxt">Actualizar</button>
                            </form>
                        </div>
                        
                        <div class="col-md-3 text-right">
                            <form action="regReporte" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="concesion" value="{{ $informacion->concesion }}">
                                <div class="form-group">
                                    <label for="fecha">Fecha del siniestro</label>
                                    <input type="date" name="date" id="fecha" class="form-control mdtxt" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion" class="sr-only">Descripción del siniestro</label>
                                    <textarea name="descripcion" id="descripcion" cols="45" class="form-control bigtxt" rows="5" placeholder="Descripción del siniestro"></textarea>
                                </div>
                                <div class="form-group mdtxt">
                                    <label for="estado" class="sr-only">Estado del daño</label>
                                    <select name="estado" class="form-control mdtxt" id="estado">
                                        <option value="">-- Selecciona el estado del daño --</option>
                                        <option value="Reportada">Reportada</option>
                                        <option value="En Reparacion">En Reparacion</option>
                                        <option value="Reparado">Reparado</option>
                                    </select>
                                </div>
                                <input type="submit" value="Levantar Reporte" class="btn btn-danger mdtxt">
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
                                        <div class="carousel-caption bigtxt">
                                            FOTO DE FRENTE
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ Storage::url($informacion->fotovehiculold) }}" alt="" width="500px">
                                        <div class="carousel-caption bigtxt">
                                            FOTO LATERAL
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ Storage::url($informacion->fotovehiculoli) }}" alt="" width="500px">
                                        <div class="carousel-caption bigtxt">
                                            FOTO LATERAL
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ Storage::url($informacion->fotovehiculotrasera) }}" alt="" width="500px">
                                        <div class="carousel-caption bigtxt">
                                            FOTO TRASERA
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{{ Storage::url($informacion->fotoconductor) }}" alt="" width="500px">
                                        <div class="carousel-caption bigtxt">
                                            CONDUCTOR
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
                <h3 class="modal-title"></h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead class="table-dark mdtxt">
                        <tr>
                            <th>Fecha de adeudo</th>
                            <th>Cuota</th>
                            <th>Otros</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="mdtxt">
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
                                <td><button type="submit" id="pagar" class="btn btn-yellow mdtxt">Pagar</button></td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning mdtxt" type="button" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>Close
                </button>
            </div>
        </div>
    </div>
</div> 


<div id="create1" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h3 class="modal-title"></h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('messages')

                    <div class="row show-grid justify-content-center">
                        <div class="col-md-8">
                            <form method="POST" action="update/{!! $informacion->concesion !!}" enctype="multipart/form-data">
                                
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="fecha" value="{{ date('Y-n-d') }}">
                                <hr>
                                <h3>Datos de la concesión</h3>
                                <hr>
                                <div class="form-group">
                                    <label for="concesion">Concesión</label><br>
                                    <input type="text" id="concesion" value="{!! $informacion->concesion !!}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control mdtxt" name="concesion" placeholder="Concesión" maxlength="6" required="true" disabled>
                                </div>
                                <hr>
                                <h3>Datos del concesionario</h3>
                                <hr>
                                <div class="form-group">
                                    <label for="nombreconcesionario">Nombre</label><label class="text-danger" style="font-size:2em">*</label><br>
                                    <input type="text" id="nombreconcesionario" value="{!! $informacion->nombreconcesionario !!}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control mdtxt" name="nombreconcesionario" placeholder="Nombre Completo" size="40"required="true">
                                </div>

                                <div class="form-group">
                                    <label for="calleconcesionario">Calle</label><label class="text-danger" style="font-size:2em">*</label><br>
                                    <input type="text" id="calleconcesionario" value="{!! $informacion->domicilioconcesionario !!}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control mdtxt" name="calleconcesionario" placeholder="Domicilio" size="40" required="true">
                                </div>

                                <label for="extconcesionario">Num. Exterior</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label for="intconcesionario">Num. Interior</label>
                                <div class="form-group form-inline">
                                    
                                    <input type="text" id="extconcesionario" value="{!! $informacion->numExtconcesionario !!}" class="form-control mdtxt" name="numext" id="extconcesionario" placeholder="Numero Exterior" size="15">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                    <input type="text" id="intconcesionario" value="{!! $informacion->numIntconcesionario !!}" class="form-control mdtxt" name="numint" id="intconcesionario" placeholder="Numero Interior" size="15">
                                </div>

                                <div class="form-group">
                                    <label for="coloniaconcesionario">Colonia</label><br>
                                    <input type="text" id="coloniaconcesionario" value="{!! $informacion->coloniaconcesionario !!}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control mdtxt" name="coloniaconcesion" id="coloniaconcesionario" placeholder="Colonia" size="36">
                                </div>
                                <div class="form-group">
                                    <label for="cpconcesionario">Código Postal</label><label class="text-danger" style="font-size: 2em">*</label><br>
                                    <input type="text" name="cpconcesionario" id="cpconcesionario" value="{!! $informacion->cpconcesionario !!}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control mdtxt" maxlength="5" placeholder="Código Postal" size="35" required="true">
                                </div>

                                <div class="form-group">
                                    <label for="ciudadconcesionario">Ciudad</label><label class="text-danger" style="font-size:2em">*</label><br>
                                    <input type="text" name="ciudadconcesionario" id="ciudadconcesionario" value="{!! $informacion->municipioconcesionario !!}" class="form-control mdtxt" placeholder="Ciudad" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="36" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="estadoconcesionario">Estado</label><label class="text-danger" style="font-size:2em">*</label><br>
                                    <input type="text" name="estadoconcesionario" id="estadoconcesionario" value="{!! $informacion->estadoconcesionario !!}" class="form-control mdtxt" placeholder="Estado" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="36" required="true">
                                </div>

                                <div class="form-group">
                                    <label for="emailconcesionario">E-mail</label><label class="text-danger" style="font-size:2em">*</label><br>
                                    <input type="email" name="emailconcesionario" id="emailconcesionario" value="{!! $informacion->emailconcesionario !!}" class="form-control mdtxt" placeholder="example@taxisdesaltillo.com" required="true" size="40">
                                </div>

                                <div class="form-group">
                                    <label for="fijoconcesionario">Telefono Fijo</label><label class="text-danger" style="font-size:2em">*</label><br>
                                    <input type="text" name="fijoconcesionario" id="fijoconcesionario" value="{!! $informacion->telefonoconcesionario !!}" class="form-control mdtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required="true" placeholder="Telefono Fijo" size="30">
                                </div>

                                <div class="form-group">
                                    <label for="cel1concesionario">Telefono Celular con Whatsapp</label><label class="text-danger" style="font-size:2em">*</label><br>
                                    <input type="text" name="cel1concesionario" id="cel1concesionario" value="{!! $informacion->celularconcesionario !!}" class="form-control mdtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required="true" placeholder="Telefono Celular con Whatsapp" size="40">
                                </div>

                                <div class="form-group">
                                    <label for="cel2concesionario">Telefono Celular Secundario</label><label class="text-danger" style="font-size:2em">*</label><br>
                                    <input type="text" name="cel2concesionario" id="cel2concesionario" value="{!! $informacion->celularconcesionario2 !!}" class="form-control mdtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required="true" placeholder="Telefono Celular secundario" size="40">
                                </div>

                                <b class="mdtxt">¿Quieres cambiar las fotos del concesionario?</b>
                                <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
                                
                            <div id="content" style="display: none;">

                                <div class="form-group">
                                    <label for="fotoconcesionario" class="text-danger" style="font-size:1.5em"><strong>Foto del Concesionario *</strong></label><br>
                                    <input type="file" class="mdtxt" name="fotoconcesionario" id="fotoconcesionario">
                                </div>

                                <div class="form-group">
                                    <label for="ineconcesionario" class="text-danger" style="font-size:1.5em"><strong>Foto del INE del Concesionario *</strong></label><br>
                                    <input type="file" class="mdtxt" name="ineconcesionario" id="ineconcesionario">
                                </div>

                                <div class="form-group">
                                    <label for="licenciaconcesionario" class="text-danger" style="font-size:1.5em"><strong>Licencia del Concesionario *</strong></label><br>
                                    <input type="file" class="mdtxt" name="licenciaconcesionario" id="licenciaconcesionario" >
                                </div>
                            </div>
                                    <br>
                                    <input type="submit" class="btn btn-yellow mdtxt" value="Editar Concesión">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>



<div id="create2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h3 class="modal-title"></h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('messages')

                    <div class="row show-grid justify-content-center">
                        <div class="col-md-8">  
                                <form method="POST" action="updateVehiculo/{!! $informacion->concesion !!}" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="fecha" value="{{ date('Y-n-d') }}">
                                    <hr>                          
                                        <hr>
                                        <h3>Datos del vehiculo</h3>
                                        <hr>

                                        <div class="form-group">
                                            <label>Marca del Vehiculo</label><label class="text-danger" style="font-size:2em">*</label><br>
                                            <input type="text" class="form-control mdtxt" name="marca" id="marca" value="{!! $informacion->marca !!}" required="true" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Marca" size="80">
                                        </div>

                                        <div class="form-group">
                                            <label>Modelo del Vehiculo</label><label class="text-danger" style="font-size:2em">*</label><br>
                                            <input type="text" name="modelo" id="modelo" value="{!! $informacion->modelo !!}" class="form-control mdtxt" required="true" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Modelo" size="80">
                                        </div>
                                        <div class="form-group">
                                            <label>Modelo del Vehiculo</label><label class="text-danger" style="font-size:2em">*</label><br>
                                            <input type="text" name="fabricacion" id="fabricacion" value="{!! $informacion->año_fabricacion !!}" class="form-control mdtxt" required="true" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Año de Fabricación" maxlength="4" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" size="37">
                                        </div>
                                        <div class="form group">
                                            <label>Numero de placas</label><label class="text-danger" style="font-size:2em">*</label><br>
                                            <input type="text" name="placas" id="placas" value="{!! $informacion->placa !!}" required="true" class="form-control mdtxt" maxlength="8" placeholder="Placas" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="35">
                                        </div>
                                        <br>
                                        <h3 class="text-warning"><strong>Taximetro</strong></h3>
                                        <div class="form-group">
                                            <label>Marca del Taximetro</label><label class="text-danger" style="font-size:2em">*</label><br>
                                            <input type="text" name="marcataximetro" id="marcataximetro" value="{!! $informacion->marcatax !!}" class="form-control mdtxt" required="true" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Marca del Taxietro" size="40">
                                        </div>
                                        <div class="form-group">
                                            <label>Modelo del Taximetro</label><label class="text-danger" style="font-size:2em">*</label><br>
                                            <input type="text" name="modelotaximetro" id="modelotaximetro" value="{!! $informacion->modelotax !!}" class="form-control mdtxt" required="true" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Modelo del Taxietro" size="40">
                                        </div>
                                        <div class="form-group">
                                            <label>Serie del Taximetro</label><label class="text-danger" style="font-size:2em">*</label><br>
                                            <input type="text" name="serietaximetro" id="serietaximetro" value="{!! $informacion->serietax !!}" class="form-control mdtxt" required="true" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Serie del Taximetro" size="40">
                                        </div>
                                        <div class="form-group">
                                            <label>ID IoT</label><label class="text-danger" style="font-size:2em">*</label><br>
                                            <input type="text" name="iot" id="iot" value="{!! $informacion->idiot !!}" class="form-control mdtxt" required="true" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Id. IoT" size="40">
                                        </div>

                                        <b class="mdtxt">¿Quieres cambiar las fotos del vehiculo?</b>
                                        <input type="checkbox" name="check2" id="check2" value="1" onchange="javascript:showContent2()" />

                                        <div id="content2" style="display: none;">


                                        <label for="fototaxi" class="text-danger" style="font-size:1.5em"><strong>Fotos del Taxi *</strong></label><br>
                                        <div class="form-group">
                                            <label for="fotod" class="text-danger">Foto delantera*</label>
                                            <input type="file" class="mdtxt" name="fotod" id="fotod">
                                        </div>
                                        <div class="form-group">
                                            <label for="fotold"class="text-danger">Foto lateral derecha*</label>
                                            <input type="file" class="mdtxt" name="fotold" id="fotold">
                                        </div>
                                        <div class="form-group">
                                            <label for="fotoli"class="text-danger">Foto lateral izquierda*</label>
                                            <input type="file" class="mdtxt" name="fotoli" id="fotoli">
                                        </div>
                                        <div class="form-group">
                                            <label for="foto"class="text-danger">Foto trasera*</label>
                                            <input type="file" class="mdtxt" name="fotot" id="fotot">
                                        </div>

                                            <div class="form-group">
                                                <label for="fototarjeta" class="text-danger" style="font-size:1.5em"><strong>Foto de la Tarjeta de Circulación *</strong></label><br>
                                                <input type="file" class="mdtxt" name="fototarjeta" id="fototarjeta">
                                            </div>

                                            <div class="form-group">
                                                <label for="fotopoliza" class="text-danger" style="font-size:1.5em"><strong>Foto de la Poliza de Seguro *</strong></label><br>
                                                <input type="file" class="mdtxt" name="fotopoliza" id="fotopoliza" >
                                            </div>
                                        </div>
                                        <br>
                                    <input type="submit" class="btn btn-yellow mdtxt" value="Editar Vehiculo">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<div id="create3" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h3 class="modal-title"></h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row show-grid container">
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                        <form action="updConductor/{!! $informacion->concesion !!}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <hr>
                            <h3>Datos del Conductor</h3>
                            <hr>
                            <div class="form-group">
                                <label>Nombre</label><label class="text-danger" style="font-size:2em">*</label><br>
                                <input type="text" id="nombreconductor" value="{!! $informacion->nombreconductor !!}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control mdtxt" name="nombreconductor" placeholder="Nombre Completo" size="40" required="true">
                            </div>

                            <label for="fecha">Fecha de nacimiento</label><label class="text-danger" style="font-size:2em">*</label><br>
                            <div class="form-group form-inline">
                                <input type="date" name="fecha_nacimiento" value="{!! $informacion->fecha_nacimiento !!}" id="fecha" class="form-control mdtxt" size="70" required="true">
                            </div>

                            <div class="form-group">
                                <label>Calle</label><label class="text-danger" style="font-size:2em">*</label><br>
                                <input type="text" id="calleconductor" value="{!! $informacion->domicilioconductor !!}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control mdtxt" name="calleconductor" id="calleconductor" placeholder="Domicilio" size="60" required="true">
                            </div>

                            <label>Num. Exterior</label>&emsp;&emsp;&emsp;&emsp;<label>Num. Interior</label><br>
                            <div class="form-group form-inline">
                                <input type="text" id="extconductor" value="{!! $informacion->numExtconductor !!}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control mdtxt" name="extconductor" placeholder="Numero Exterior" size="12">
                                &emsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" id="intconductor" value="{!! $informacion->numIntconductor !!}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control mdtxt" name="intconductor" placeholder="Numero Interior" size="12">
                            </div>

                            <div class="form-group">
                                <label>Colonia</label><br>
                                <input type="text" id="coloniaconductor" value="{!! $informacion->coloniaconductor !!}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="form-control mdtxt" name="coloniaconductor" placeholder="Colonia" size="36">
                            </div>
                            <div class="form-group">
                                <label>Código Postal</label><label class="text-danger" style="font-size:2em">*</label><br>
                                <input type="text" name="cpconductor" id="cpconductor" value="{!! $informacion->cpconductor !!}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control mdtxt" maxlength="5" placeholder="Código Postal" size="35" required="true">
                            </div>

                            <div class="form-group">
                                <label>Ciudad</label><label class="text-danger" style="font-size:2em">*</label><br>
                                <input type="text" name="ciudadconductor" id="ciudadconductor" value="{!! $informacion->municipioconductor !!}" class="form-control mdtxt" placeholder="Ciudad" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="36" required="true">
                            </div>
                            <div class="form-group">
                                <label>Estado</label><label class="text-danger" style="font-size:2em">*</label><br>
                                <input type="text" name="estadoconductor" id="estadoconductor" value="{!! $informacion->estadoconductor !!}" class="form-control mdtxt" placeholder="Estado" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="36" required="true">
                            </div>

                            <div class="form-group">
                                <label>E-mail</label><label class="text-danger" style="font-size:2em">*</label><br>
                                <input type="email" name="emailconductor" id="emailconductor" value="{!! $informacion->emailconductor !!}" class="form-control mdtxt" placeholder="example@taxisdesaltillo.com" size="40" required="true">
                            </div>

                            <div class="form-group">
                                <label>Telefono Fijo</label><label class="text-danger" style="font-size:2em">*</label><br>
                                <input type="text" name="fijoconductor" id="fijoconductor" value="{!! $informacion->telefonoconductor !!}" class="form-control mdtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Telefono Fijo" size="40" required="true">
                            </div>

                            <div class="form-group">
                                <label>Celular</label><label class="text-danger" style="font-size:2em">*</label><br>
                                <input type="text" name="cel1conductor" id="cel1conductor" value="{!! $informacion->celularconductor !!}" class="form-control" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Telefono Celular con Whatsapp" size="40" required="true">
                            </div>

                            <div class="form-group">
                                <label>Celular Alternativo</label><label class="text-danger" style="font-size:2em">*</label><br>
                                <input type="text" name="cel2conductor" id="cel2conductor" value="{!! $informacion->celularconductor2 !!}" class="form-control mdtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Telefono Celular Secundario" size="40" required="true">
                            </div>

                            <b class="mdtxt">¿Quieres cambiar las fotos del conductor?</b>
                            <input type="checkbox" name="check3" id="check3" value="1" onchange="javascript:showContent3()" />

                            <div id="content3" style="display: none;">

                            <div class="form-group">
                                <label for="fotoconductor" class="text-danger" style="font-size:1.5em"><strong>Foto del Conductor *</strong></label><br>
                                <input type="file" class="mdtxt" name="fotoconductor" id="fotoconductor">
                            </div>

                            <div class="form-group">
                                <label for="ineconductor" class="text-danger" style="font-size:1.5em"><strong>Foto del INE del Conductor *</strong></label><br>
                                <input type="file" class="mdtxt" name="ineconductor" id="ineconductor">
                            </div>

                            <div class="form-group">
                                <label for="licenciaconductor" class="text-danger" style="font-size:1.5em"><strong>Licencia  del Conductor *</strong></label><br>
                                <input type="file" class="mdtxt" name="licenciaconductor" id="licenciaconductor" >
                            </div>
                        </div>
                        <br>
                                <input type="submit" value="Editar" class="btn btn-yellow mdtxt"> 
                        </form>
                        </div>
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

