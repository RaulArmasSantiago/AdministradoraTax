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
                            <a href="#" class="create-modal btn btn-yellow">Pagar</a>
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
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" role="form">
                <div class="form-group row add">
                  <label class="col-sm-2" for="title">Title :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title"
                    placeholder="Your Title Here" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="body">Body :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="body" name="body"
                    placeholder="Your Body Here" required>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning" type="submit" id="add">
                    <span class="glyphicon glyphicon-plus"></span>Save Post
                </button>
                <button class="btn btn-warning" type="button" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remobe"></span>Close
                </button>
            </div>
        </div>
    </div>
</div> 
@endsection

