@extends('layouts.admin')
@section('css-link')
    <link rel="stylesheet" href="{{asset('css/empresas.css')}}">
@endsection
@section('content')
{{--    {{$canAddEmpresa}}--}}
    <div class="crudContainer">
        <div class="crudContainer__header">
            <h2 class="crudContainer__header__title">Gestion de Empresa</h2>
            @if($canAddEmpresa)
                <button class="btn btn-primary crudContainer__header__button" type="button" id="calabaza"><span>Agregar Empresa</span><i
                        class="crudContainer__header__button__icon fas fa-user-plus"></i>
                </button>
            @endif
        </div>
        <div class="crudContainer__body">
            <div class="cajas">
                <table class="table">
                    <thead class="table__thead thead-dark">
                    <tr class="table__thead__row">
                        <th class="table__thead__row__col" scope="col">Nombre</th>
                        <th class="table__thead__row__col" scope="col">Giro</th>
                        <th class="table__thead__row__col" scope="col">Proceso</th>
                        <th class="table__thead__row__col" scope="col">Editar</th>
                    </tr>
                    </thead>
                    <tbody class="table__tbody">
                        @if(!$empresa->isEmpty())
                            <tr class="table__tbody__row">
                                <td class="table__tbody__row__col">{{$empresa[0]->nombre}}</td>
                                <td class="table__tbody__row__col">{{$empresa[0]->giro}}</td>
                                <td class="table__tbody__row__col">{{$empresa[0]->proceso}}</td>
                                <td class="table__tbody__row__col table__tbody__row__col--mas">
                                    <a class="table__tbody__row__col__a table__tbody__row__col--mas__a table__tbody__row__col--mas__a--edit" href="/editarEmpresas.html"><i class="fas fa-edit"></i></a>
                                    <div class="table__tbody__row__col__a table__tbody__row__col--mas__a table__tbody__row__col--mas__a--trash" href="#">
                                        <form action="{{route('empresa.destroy', $empresa[0]->id)}}" method="POST" id="form-trash">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" id="submit-button-destroy">
                                                <i class="fas fa-trash-alt" id="form-trash-button"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endif


                    </tbody>
                </table>
            </div><!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Empresa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('empresa.store')}}" id="form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="input form-control" name="nombre" type="text" id="exampleInputPassword1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Giro</label>
                                    <input class="input form-control" name="giro" type="text" id="exampleInputPassword1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Proceso</label>
                                    <select class="input custom-select" name="proceso">
                                        <option value="Microempresa">Microempresa</option>
                                        <option value="Mediana Empresa">Mediana Empresa</option>
                                        <option value="Pequeña Empresa">Pequeña Empresa</option>
                                        <option value="Grande Empresa">Grande Empresa</option>
                                    </select>
                                </div>



                                <button type="submit" class="btn btn-primary agregar">Agregar</button>
                                <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal" id="cancelar">Cancelar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js-link')
    <script type="text/javascript" src="{{asset('js/empresas.js')}}"></script>
@endsection

