@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header letra-grande"><strong> Aviso </strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Para poder ver esta concesion debes asignar primero un conductor.</h3>
                    <a href=" {{ route('regConductor') }}" class="bigtxt">Registra un conductor aqui</a><br><strong class="mdtxt">Ó</strong><br>
                    <label class="bigtxt"> Asigna un conductor a esta concesión</label>
                    <br>
                    <form action="asignar" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @foreach ($concesion as $con )
                            <input type="hidden" name="concesion" value="{{ $con->id }}">
                        @endforeach
                        <div class="form-group form-inline">
                            <label for="nombre" class="sr-only">Nombre del conductor:</label>
                            <input type="text" name="nombreconductor" id="nombre" class="form-control bigtxt" placeholder="Nombre del Conductor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="50">
                        </div>
                        <div class="form-group form-inline">
                            <label for="email" class="sr-only">Email:</label>
                            <input type="email" name="email" id="email" class="form-control bigtxt" placeholder="Email" size="50">
                        </div>
                        <input type="submit" class="btn btn-yellow bigtxt" value="Asignar taxista">
                        &emsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ route('home') }}" class="btn btn-red bigtxt" value="Cancelar">Cancelar</a>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection