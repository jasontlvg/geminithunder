@extends('layouts.admin')
@section('css-link')
    <link href={{asset('css/editarDepartamentos.css')}} rel="stylesheet">
@endsection
@section('content')
    <div class="crudContainer">
        {{$errors}}
        <div class="crudContainer__body"><!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" id="formContainer">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Departamento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="tlx">
                            <form action="{{route('departamentos.update', $id)}}" METHOD="POST">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="form-group">
                                    <label class="form-group__label">Nombre</label>
                                    <input class="form-group__input form-control" name="nombre" type="text" placeholder="Finanzas" value="{{$dep->nombre}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-group__label">Clave</label>
                                    <input class="form-group__input form-control" name="clave" type="text" placeholder="A0S4" value="{{$dep->clave}}">
                                </div>
{{--                                <div class="form-grup">--}}
{{--                                    <label class="form-group__label">Empresa</label>--}}
{{--                                    <select class="form-grup__input custom-select" name="empresa" id="lala">--}}
{{--                                        <option>Huawei</option>--}}
{{--                                        <option>Xiaomi</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <button type="submit" class="btn btn-primary agregar" id="editarBoton">Agregar</button>
                                <a class="btn btn-secondary cancelar" href="{{route("departamentos.index")}}" id="regresarBoton">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js-link')
    <script type="text/javascript" src="{{asset('js/editarDepartamentos.js')}}"></script>
@endsection


