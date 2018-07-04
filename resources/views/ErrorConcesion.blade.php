@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong> Aviso </strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Para poder ver esta concesion debes asignar primero un conductor.</h5>
                    <a href=" {{ route('regConductor') }}">Registra un conductor aqui</a><br><strong>Ó</strong><br>
                    Assigna un conductor a esta concesión
                    <br>
                    <form action="asignar" method="POST" enctype="multipart/form-data">
                        <div class="form-group form-inline">
                            <label for="nombre" class="sr-only">Nombre del conductor:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del Conductor" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" size="50">
                        </div>
                        <div class="form-group form-inline">
                            <label for="email" class="sr-only">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" size="50">
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection