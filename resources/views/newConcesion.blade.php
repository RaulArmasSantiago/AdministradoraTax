@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bigtxt">Nueva Concesión</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('messages')

                    <div class="row show-grid justify-content-center">
                        <div class="col-md-8">
                            <form method="POST" action="registrar" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="fecha" value="{{ date('Y-n-d') }}">
                                <hr>
                                <h3>Datos de la concesión</h3>
                                <hr>
                                <div class="form-group form-inline">
                                    <label for="concesion" class="sr-only">Concesión</label>
                                    <input type="text" id="concesion" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control bigtxt" name="concesion" placeholder="Concesión" maxlength="6" required="true"><label class="text-danger" style="font-size:2em">*</label>
                                </div>
                                <hr>
                                <h3>Datos del concesionario</h3>
                                <hr>
                                <div class="form-group form-inline">
                                    <label for="nombreconcesionario" class="sr-only">Nombre</label>
                                    <input type="text" id="nombreconcesionario" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control bigtxt" name="nombreconcesionario" placeholder="Nombre Completo" size="80"required="true"><label class="text-danger" style="font-size:2em">*</label>
                                </div>

                                <div class="form-group form-inline">
                                    <label for="calleconcesionario" class="sr-only">Calle</label>
                                    <input type="text" id="calleconcesionario" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control bigtxt" name="calleconcesionario" placeholder="Domicilio" size="80" required="true"><label class="text-danger" style="font-size:2em">*</label>
                                </div>

                                <div class="form-group form-inline">
                                    <label for="extconcesionario" class="sr-only">Num. Exterior</label>
                                    <input type="text" id="extconcesionario" class="form-control bigtxt" name="numext" id="extconcesionario" placeholder="Numero Exterior" size="36">
                                    &emsp;&nbsp;&nbsp;
                                    <label for="intconcesionario" class="sr-only">Num. Interior</label>
                                    <input t    ype="text" id="intconcesionario" class="form-control bigtxt" name="numint" id="intconcesionario" placeholder="Numero Interior" size="37">
                                </div>

                                <div class="form-group form-inline">
                                    <label for="coloniaconcesionario" class="sr-only">Colonia</label>
                                    <input type="text" id="coloniaconcesionario" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control bigtxt" name="coloniaconcesion" id="coloniaconcesionario" placeholder="Colonia" size="36">
                                    &emsp;&nbsp;&nbsp;
                                    <label for="cpconcesionario" class="sr-only">Código Postal</label>
                                    <input type="text" name="cpconcesionario" id="cpconcesionario" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control bigtxt" maxlength="5" placeholder="Código Postal" size="37" required="true"><label class="text-danger" style="font-size: 2em">*</label>
                                </div>

                                <div class="form-group form-inline">
                                    <label for="ciudadconcesionario" class="sr-only">Ciudad</label>
                                    <input type="text" name="ciudadconcesionario" id="ciudadconcesionario" class="form-control bigtxt" placeholder="Ciudad" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="36" required="true"><label class="text-danger" style="font-size:2em">*</label>
                                    &emsp;&nbsp;
                                    <label for="estadoconcesionario" class="sr-only">Estado</label>
                                    <input type="text" name="estadoconcesionario" id="estadoconcesionario" class="form-control bigtxt" placeholder="Estado" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="36" required="true"><label class="text-danger" style="font-size:2em">*</label>
                                </div>

                                <div class="form-group form-inline">
                                    <label for="emailconcesionario" class="sr-only">E-mail</label>
                                    <input type="email" name="emailconcesionario" id="emailconcesionario" class="form-control bigtxt" placeholder="example@taxisdesaltillo.com" required="true" size="40"><label class="text-danger" style="font-size:2em">*</label>
                                </div>

                                <div class="form-group form-inline">
                                    <label for="fijoconcesionario" class="sr-only">Telefono Fijo</label>
                                    <input type="text" name="fijoconcesionario" id="fijoconcesionario" class="form-control bigtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required="true" placeholder="Telefono Fijo" size="40"><label class="text-danger" style="font-size:2em">*</label>
                                </div>

                                <div class="form-group form-inline">
                                    <label for="cel1concesionario" class="sr-only">Telefono Celular con Whatsapp</label>
                                    <input type="text" name="cel1concesionario" id="cel1concesionario" class="form-control bigtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required="true" placeholder="Telefono Celular con Whatsapp" size="40"><label class="text-danger" style="font-size:2em">*</label>
                                </div>

                                <div class="form-group form-inline">
                                    <label for="cel2concesionario" class="sr-only">Telefono Celular Secundario</label>
                                    <input type="text" name="cel2concesionario" id="cel2concesionario" class="form-control bigtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required="true" placeholder="Telefono Celular secundario" size="40"><label class="text-danger" style="font-size:2em">*</label>
                                </div>

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
                                
                                <hr>
                                <h3>Datos del vehiculo</h3>
                                <hr>

                                <div class="form-group form-inline">
                                    <label for="marca" class="sr-only">Marca del Vehiculo</label>
                                    <input type="text" class="form-control bigtxt" name="marca" id="marca" required="true" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Marca" size="80"><label class="text-danger" style="font-size:2em">*</label>
                                </div>

                                <div class="form-group form-inline">
                                    <label for="modelo" class="sr-only">Modelo del Vehiculo</label>
                                    <input type="text" name="modelo" id="modelo" class="form-control bigtxt" required="true" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Modelo" size="80"><label class="text-danger" style="font-size:2em">*</label>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="fabricacion" class="sr-only">Modelo del Vehiculo</label>
                                    <input type="text" name="fabricacion" id="fabricacion" class="form-control bigtxt" required="true" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Año de Fabricación" maxlength="4" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" size="37"><label class="text-danger" style="font-size:2em">*</label>
                                    &nbsp;&nbsp;
                                    <label for="placas" class="sr-only">Numero de placas</label>
                                    <input type="text" name="placas" id="placas" required="true" class="form-control bigtxt" maxlength="8" placeholder="Placas" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="35"><label class="text-danger" style="font-size:2em">*</label>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="kilometraje" class="sr-only">Kilometraje del vehiculo</label>
                                    <input type="text" name="kilometraje" id="kilometraje" required="true" placeholder="Kilometraje del Vehiculo" class="form-control bigtxt" size="37" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"><label class="text-danger" style="font-size:2em">*</label>
                                </div>
                                <h5 class="text-warning"><strong>Taximetro</strong></h5>
                                <div class="form-group form-inline">
                                    <label for="marcataximetro" class="sr-only">Marca del Taximetro</label>
                                    <input type="text" name="marcataximetro" id="marcataximetro" class="form-control bigtxt" required="true" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Marca del Taxietro" size="40"><label class="text-danger" style="font-size:2em">*</label>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="modelotaximetro" class="sr-only">Modelo del Taximetro</label>
                                    <input type="text" name="modelotaximetro" id="modelotaximetro" class="form-control bigtxt" required="true" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Modelo del Taxietro" size="40"><label class="text-danger" style="font-size:2em">*</label>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="serietaximetro" class="sr-only">Serie del Taximetro</label>
                                    <input type="text" name="serietaximetro" id="serietaximetro" class="form-control bigtxt" required="true" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Serie del Taximetro" size="40"><label class="text-danger" style="font-size:2em">*</label>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="iot" class="sr-only">ID IoT</label>
                                    <input type="text" name="iot" id="iot" class="form-control bigtxt" required="true" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Id. IoT" size="40">
                                </div>

                                
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
                                        <label for="fotopoliza" class="text-danger" style="font-size:1.5em"><strong>Foto de la Poliza de Segro *</strong></label><br>
                                        <input type="file" class="mdtxt" name="fotopoliza" id="fotopoliza" >
                                    </div>

                                    <b class="bigtxt">¿Quieres registrar a su chofer?</b>
                                    <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
                                    
                                    <div id="content" style="display: none;">
                                            <hr>
                                            <h3>Datos del Conductor</h3>
                                            <hr>
                                            <div class="form-group form-inline">
                                                <label for="nombreconductor" class="sr-only">Nombre</label>
                                                <input type="text" id="nombreconductor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control bigtxt" name="nombreconductor" placeholder="Nombre Completo" size="80"><label class="text-danger" style="font-size:2em">*</label>
                                            </div>

                                            <label for="fecha">Fecha de nacimiento</label>
                                            <div class="form-group form-inline">
                                                <input type="date" name="fecha_nacimiento" id="fecha" class="form-control mdtxt" size="60"><label class="text-danger" style="font-size:2em">*</label><br>
                                            </div>
            
                                            <div class="form-group form-inline">
                                                <label for="calleconductor" class="sr-only">Calle</label>
                                                <input type="text" id="calleconductor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control bigtxt" name="calleconductor" id="calleconductor" placeholder="Domicilio" size="80"><label class="text-danger" style="font-size:2em">*</label>
                                            </div>
            
                                            <div class="form-group form-inline">
                                                <label for="extconductor" class="sr-only">Num. Exterior</label>
                                                <input type="text" id="extconductor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control bigtxt" name="extconductor" placeholder="Numero Exterior" size="36">
                                                &emsp;&nbsp;&nbsp;
                                                <label for="intconductor" class="sr-only">Num. Interior</label>
                                                <input t    ype="text" id="intconductor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control bigtxt" name="intconductor" placeholder="Numero Interior" size="37">
                                            </div>
            
                                            <div class="form-group form-inline">
                                                <label for="coloniaconductor" class="sr-only">Colonia</label>
                                                <input type="text" id="coloniaconductor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="form-control bigtxt" name="coloniaconductor" placeholder="Colonia" size="36">
                                                &emsp;&nbsp;&nbsp;
                                                <label for="cpconductor" class="sr-only">Código Postal</label>
                                                <input type="text" name="cpconductor" id="cpconductor" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control bigtxt" maxlength="5" placeholder="Código Postal" size="37"><label class="text-danger" style="font-size: 2em">*</label>
                                            </div>
            
                                            <div class="form-group form-inline">
                                                <label for="ciudadconductor" class="sr-only">Ciudad</label>
                                                <input type="text" name="ciudadconductor" id="ciudadconductor" class="form-control bigtxt" placeholder="Ciudad" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="36"><label class="text-danger" style="font-size:2em">*</label>
                                                &emsp;&nbsp;
                                                <label for="estadoconductor" class="sr-only">Estado</label>
                                                <input type="text" name="estadoconductor" id="estadoconductor" class="form-control bigtxt" placeholder="Estado" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="36"><label class="text-danger" style="font-size:2em">*</label>
                                            </div>

                                            <div class="form-group form-inline">
                                                <label for="emailconductor" class="sr-only">E-mail</label>
                                                <input type="email" name="emailconductor" id="emailconductor" class="form-control bigtxt" placeholder="example@taxisdesaltillo.com" size="40"><label class="text-danger" style="font-size:2em">*</label>
                                            </div>
            
                                            <div class="form-group form-inline">
                                                <label for="fijoconductor" class="sr-only">Telefono Fijo</label>
                                                <input type="text" name="fijoconductor" id="fijoconductor" class="form-control bigtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Telefono Fijo" size="40"><label class="text-danger" style="font-size:2em">*</label>
                                            </div>
            
                                            <div class="form-group form-inline">
                                                <label for="cel1conductor" class="sr-only">Telefono Fijo</label>
                                                <input type="text" name="cel1conductor" id="cel1conductor" class="form-control bigtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Telefono Celular con Whatsapp" size="40"><label class="text-danger" style="font-size:2em">*</label>
                                            </div>
            
                                            <div class="form-group form-inline">
                                                <label for="cel2conductor" class="sr-only">Telefono Fijo</label>
                                                <input type="text" name="cel2conductor" id="cel2conductor" class="form-control bigtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Telefono Celular Secundario" size="40"><label class="text-danger" style="font-size:2em">*</label>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="fotoconductor" class="text-danger" style="font-size:1.5em"><strong>Foto del Conductor *</strong></label><br>
                                                <input type="file" class="mdtxt" name="fotoconductor" id="fotoconductor">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="ineconductor" class="text-danger" style="font-size:1.5em"><strong>Foto del INE del Conductor *</strong></label><br>
                                                <input type="file" class="mdtxt" name="ineconductor" id="ineconductor">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="licenciaconductor" class="text-danger" style="font-size:1.5em"><strong>Licencia del Conductor *</strong></label><br>
                                                <input type="file" class="mdtxt" name="licenciaconductor" id="licenciaconductor" >
                                            </div>                                    
                                    </div>
                                    <br>
                                    <div>
                                    <input type="submit" class="btn btn-yellow  bigtxt" value="Guardar Concesión">
                                    &emsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('home') }}" class="btn btn-red bigtxt" value="Cancelar">Cancelar</a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection