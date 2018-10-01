@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftaxisdesaltillo%2F&tabs=timeline&width=350&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="450" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>
        <div class="col-md-8 letra-grande">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row show grid">
                        <div class="col-md-4">
                            <p>
                                <a href="{{ route('corte') }}">
                                    <button class="btn btn-yellow bigtxt">Corte Diario</button>
                                </a>
                            </p>
                            <p>
                                <a href="{{ route('newConcesion') }}">
                                    <button class="btn btn-yellow bigtxt">Nueva Concesión</button>
                                </a>
                            </p>
                            <p>
                                <a href="{{ route('regConductor') }}">
                                    <button class="btn btn-yellow bigtxt">Nuevo Conductor</button>
                                </a>
                            </p>
                        </div>
                        <div class="col-md-8">
                            <form action="VerConcesion" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group form-inline">
                                    <label for="concesion" class="sr-only bigtxt">Concesión</label>
                                    <input type="text" class="form-control bigtxt" name="concesion" id="concesion" placeholder="Concesion" size="40">
                                </div>
                                <input type="submit" class="btn btn-yellow bigtxt" value="Buscar">
                            </form>   
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
