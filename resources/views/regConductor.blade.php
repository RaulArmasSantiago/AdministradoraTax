@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bigtxt">Registro de Conductor</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row show-grid container">
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                        <form action="regConductor" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <hr>
                            <h3>Datos del Conductor</h3>
                            <hr>
                            <div class="form-group form-inline">
                                <label for="nombreconductor" class="sr-only">Nombre</label>
                                <input type="text" id="nombreconductor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control bigtxt" name="nombreconductor" placeholder="Nombre Completo" size="78" required="true"><label class="text-danger" style="font-size:2em">*</label>
                            </div>

                            <label for="fecha">Fecha de nacimiento</label>
                            <div class="form-group form-inline">
                                <input type="date" name="fecha_nacimiento" id="fecha" class="form-control mdtxt" size="70" required="true"><label class="text-danger" style="font-size:2em">*</label><br>
                            </div>

                            <div class="form-group form-inline">
                                <label for="calleconductor" class="sr-only">Calle</label>
                                <input type="text" id="calleconductor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control bigtxt" name="calleconductor" id="calleconductor" placeholder="Domicilio" size="78" required="true"><label class="text-danger" style="font-size:2em">*</label>
                            </div>

                            <div class="form-group form-inline">
                                <label for="extconductor" class="sr-only">Num. Exterior</label>
                                <input type="text" id="extconductor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control bigtxt" name="extconductor" placeholder="Numero Exterior" size="36">
                                &emsp;&nbsp;&nbsp;
                                <label for="intconductor" class="sr-only">Num. Interior</label>
                                <input type="text" id="intconductor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="mayusculas form-control bigtxt" name="intconductor" placeholder="Numero Interior" size="36">
                            </div>

                            <div class="form-group form-inline">
                                <label for="coloniaconductor" class="sr-only">Colonia</label>
                                <input type="text" id="coloniaconductor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" class="form-control bigtxt" name="coloniaconductor" placeholder="Colonia" size="36">
                                &emsp;&nbsp;&nbsp;
                                <label for="cpconductor" class="sr-only">Código Postal</label>
                                <input type="text" name="cpconductor" id="cpconductor" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control bigtxt" maxlength="5" placeholder="Código Postal" size="36" required="true"><label class="text-danger" style="font-size: 2em">*</label>
                            </div>

                            <div class="form-group form-inline">
                                <label for="ciudadconductor" class="sr-only">Ciudad</label>
                                <input type="text" name="ciudadconductor" id="ciudadconductor" class="form-control bigtxt" placeholder="Ciudad" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="36" required="true"><label class="text-danger" style="font-size:2em">*</label>
                                &nbsp;&nbsp;&nbsp;
                                <label for="estadoconductor" class="sr-only">Estado</label>
                                <input type="text" name="estadoconductor" id="estadoconductor" class="form-control bigtxt" placeholder="Estado" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="36" required="true"><label class="text-danger" style="font-size:2em">*</label>
                            </div>

                            <div class="form-group form-inline">
                                <label for="emailconductor" class="sr-only">E-mail</label><br>
                                <input type="email" name="emailconductor" id="emailconductor" class="form-control bigtxt" placeholder="example@taxisdesaltillo.com" size="40" required="true"><label class="text-danger" style="font-size:2em">*</label>
                            </div>

                            <div class="form-group form-inline">
                                <label for="fijoconductor" class="sr-only">Telefono Fijo</label>
                                <input type="text" name="fijoconductor" id="fijoconductor" class="form-control bigtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Telefono Fijo" size="40" required="true"><label class="text-danger" style="font-size:2em">*</label>
                            </div>

                            <div class="form-group form-inline">
                                <label for="cel1conductor" class="sr-only">Telefono Fijo</label>
                                <input type="text" name="cel1conductor" id="cel1conductor" class="form-control bigtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Telefono Celular con Whatsapp" size="40" required="true"><label class="text-danger" style="font-size:2em">*</label>
                            </div>

                            <div class="form-group form-inline">
                                <label for="cel2conductor" class="sr-only">Telefono Fijo</label>
                                <input type="text" name="cel2conductor" id="cel2conductor" class="form-control bigtxt" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Telefono Celular Secundario" size="40" required="true"><label class="text-danger" style="font-size:2em">*</label>
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
                                <label for="licenciaconductor" class="text-danger" style="font-size:1.5em"><strong>Licencia  del Conductor *</strong></label><br>
                                <input type="file" class="mdtxt" name="licenciaconductor" id="licenciaconductor" >
                            </div>
                            <div>
                                <input type="submit" value="Registrar" class="btn btn-yellow bigtxt">
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