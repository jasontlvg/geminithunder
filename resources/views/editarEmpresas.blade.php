@extends('layouts.admin')
@section('css-link')
    <link href="{{asset('css/editarEmpresas.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="crudContainer">
        <div class="crudContainer__body"><!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" id="formContainer">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Empresa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="tlx">
                            <form action="">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="input form-control" name="nombre" type="text"
                                           id="exampleInputPassword1" placeholder=""></div>
                                <div class="form-group">
                                    <label>Giro</label>
                                    <input class="input form-control" name="giro" type="text"
                                           id="exampleInputPassword1" placeholder=""></div>
                                <div class="form-group">
                                    <label>Proceso</label>
                                    <input class="input form-control" name="proceso" type="text"
                                           id="exampleInputPassword1" placeholder=""></div>
                                <button type="submit" class="btn btn-primary agregar" id="editarBoton">Agregar
                                </button>
                                <a class="btn btn-secondary cancelar" href="/empresas.html" id="regresarBoton">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js-link')
    <script type="text/javascript" src="{{asset('js/editarEmpresas.18e905db810b76271490.js')}}"></script>
@endsection





