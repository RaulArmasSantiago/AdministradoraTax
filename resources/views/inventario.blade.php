@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 letra-grande">
            <div class="card">
                <div class="card-header">Inventario</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="#" class="create-modal4 btn btn-yellow btn-sm"><h4>Nuevo elemento del inventario</h4> <img src="img/edit-icon.png" alt=""></a>
                    <br><br>
                    <div class="row letra-grande">
                        <div class="col-md-12 center">
                           <center><h1 class="letra-grande">Thrrough-Hole</h1></center>
                        </div>
                        <br>
                        <div class="col-md-1"></div>
                        <div class="col-md-10 text-center">
                            <table class="table table-striped table-bordered">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Categoria</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($through as $t)
                                    <tr>
                                        <td>{{$t->id}}</td>
                                        <td>{{$t->producto}}</td>
                                        <td>{{$t->descripcion}}</td>
                                        <td>{{$t->categoria}}</td>
                                        <td>
                                        <form action="minusProduct" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{ $t->id }}">
                                            <button class="btn btn-sm" type="submit"><img src="/img/math-minus-icon.png" alt="mas"></button>
                                        </form>
                                        {{$t->cantidad}}
                                        <form action="plusProduct" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{ $t->id }}">
                                        <button class="btn btn-sm" type="submit"><img src="/img/math-add-icon.png" alt="mas"></button>
                                        </form>
                                        
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <br><br>
                    <div class="row letra-grande">
                            <div class="col-md-12 center">
                                    <center><h1 class="letra-grande">Superficie</h1></center>
                            </div>
                            <br>
                            <div class="col-md-1"></div>
                            <div class="col-md-10 text-center">
                                <table class="table table-striped table-bordered">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Categoria</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($superficie as $s)
                                        <tr>
                                            <td>{{$s->id}}</td>
                                            <td>{{$s->producto}}</td>
                                            <td>{{$s->descripcion}}</td>
                                            <td>{{$s->categoria}}</td>
                                            <td>
                                            <form action="minusProduct" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" value="{{ $s->id }}">
                                                <button class="btn btn-sm" type="submit"><img src="/img/math-minus-icon.png" alt="mas"></button>
                                            </form>
                                            {{$s->cantidad}}
                                            <form action="plusProduct" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" value="{{ $s->id }}">
                                                <button class="btn btn-sm" type="submit"><img src="/img/math-add-icon.png" alt="mas"></button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <br><br>

                        <div class="row letra-grande">
                                <div class="col-md-12 center">
                                   <center><h1 class="letra-grande">Maeriales</h1></center>
                                </div>
                                <br>
                                <div class="col-md-1"></div>
                                <div class="col-md-10 text-center">
                                    <table class="table table-striped table-bordered">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Categoria</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($inventario as $i)
                                            <tr>
                                                <td>{{$i->id}}</td>
                                                <td>{{$i->producto}}</td>
                                                <td>{{$i->descripcion}}</td>
                                                <td>{{$i->categoria}}</td>
                                                <td>
                                                <form action="minusProduct" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $i->id }}">
                                                    <button class="btn btn-sm" type="submit"><img src="/img/math-minus-icon.png" alt="mas"></button>
                                                </form>
                                                {{$i->cantidad}}
                                                <form action="plusProduct" method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="id" value="{{ $i->id }}">
                                                    <button class="btn btn-sm" type="submit"><img src="/img/math-add-icon.png" alt="mas"></button>
                                                </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-1"></div>
                            </div>


                </div>
            </div>
        </div>

    </div>
</div>

<div id="create4" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h3 class="modal-title"></h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form action="addProduct" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="name" class="sr-only">Nombre</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="description" class="sr-only">Descripcion</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Descripción del producto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categoria" class="sr-only">Categoria</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="-- Seleccione una categoria --" selected>-- Seleccione una categoria --</option>
                                    <option value="Montaje Superficial">Montaje Superficial</option>
                                    <option value="Through-Hole">Through-Hole</option>
                                    <option value="General">Material</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cantidad" class="sr-only">Cantidad inicial</label>
                                <input class="form-control" type="text" name="cantidad" id="cantidad" placeholder="Cantidad inicial">
                            </div>
                            <input class="btn btn-success" type="submit" value="Guardar">                          
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>



@endsection
