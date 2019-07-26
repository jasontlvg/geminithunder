@extends('layouts.admin')

@section('css-link')
    <link href="{{asset('css/departamentos.css')}}" rel="stylesheet">
@endsection
@section('content')
{{--    {{$canAddDepartamento}}--}}
    <div class="crudContainer">
        @if($canAddDepartamento)
            <div class="crudContainer__header">
                <h2 class="crudContainer__header__title">Gestion de Departamentos</h2>
                <button class="btn btn-primary crudContainer__header__button" type="button" id="calabaza"><span>Agregar Departamento</span><i
                        class="crudContainer__header__button__icon fas fa-layer-group"></i></button>
            </div>

            @if($errors->has('nombre'))
                <div class="alert alert-warning alert-dismissible fade show bg-danger text-white" role="alert">
                    <strong>El departamento ya existe</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if($errors->has('clave'))
                <div class="alert alert-warning alert-dismissible fade show bg-danger text-white" role="alert">
                    <strong>Escoge una clave con minimo 3 Caracteres</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @isset($depEliminado)
                <div class="alert alert-warning alert-dismissible fade show bg-success text-white" role="alert" >

                    El Departamento a sido eliminado

                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            @endisset

            <div class="crudContainer__body">
                <div class="cajas">
                    <table class="table">
                        <thead class="table__thead thead-dark">
                        <tr class="table__thead__row">
                            <th class="table__thead__row__col" scope="col">#ID</th>
                            <th class="table__thead__row__col" scope="col">Nombre</th>
                            <th class="table__thead__row__col" scope="col">Clave</th>
                            <th class="table__thead__row__col" scope="col">Editar</th>
                        </tr>
                        </thead>
                        <tbody class="table__tbody">

                            @foreach($deps as $dep)
                                <tr class="table__tbody__row">
                                    <th class="table__tbody__row__col" scope="row">{{$dep->id}}</th>
                                    <td class="table__tbody__row__col">{{$dep->nombre}}</td>
                                    <td class="table__tbody__row__col">{{$dep->clave}}</td>
                                    <td class="table__tbody__row__col table__tbody__row__col--mas">
                                        <a class="table__tbody__row__col__a table__tbody__row__col--mas__a table__tbody__row__col--mas__a--edit" href="{{route('departamentos.edit', $dep)}}"><i class="fas fa-edit"></i></a>
                                        <div class="table__tbody__row__col__a table__tbody__row__col--mas__a table__tbody__row__col--mas__a--trash" href="#">
                                            <form action="{{route('departamentos.destroy', $dep)}}" method="POST" id="form-trash">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" id="submit-button-destroy">
                                                    <i class="fas fa-trash-alt" id="form-trash-button"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div><!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Departamento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('departamentos.store')}}" id="form" METHOD="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-group__label">Nombre</label>
                                        <input class="form-group__input form-control" name="nombre" type="text"
                                               placeholder="Finanzas">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-group__label">Clave</label>
                                        <input class="form-group__input form-control" name="clave" type="text" placeholder="A0S4">
                                    </div>
    {{--                                <div class="form-grup">--}}
    {{--                                    <label class="form-group__label">Empresa</label>--}}
    {{--                                    <select class="form-grup__input custom-select" name="empresa" id="lala">--}}
    {{--                                        <option>Huawei</option>--}}
    {{--                                        <option>Xiaomi</option>--}}
    {{--                                    </select>--}}
    {{--                                </div>--}}
                                    <button type="submit" class="btn btn-primary agregar">Agregar</button>
                                    <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal" id="cancelar">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h2>Agrega una Empresa Primero!</h2>
        @endif




    </div>
@endsection

@section('js-link')
    <script type="text/javascript" src="{{asset('js/departamentos.js')}}"></script>
@endsection
