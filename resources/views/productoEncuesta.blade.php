@extends('layouts.empleado')

@section('css-link')
    <link href="{{asset('css/personasEncuesta.css')}}" rel="stylesheet">
@endsection

@section('content')
    <h1>Encuesta - Producto</h1>
    <form action="{{route('producto.saveForm')}}" method="POST" class="ui form">
        @csrf
        @foreach($preguntas as $pregunta)
            <div class="grouped fields">
                @php
                    $i++;
                @endphp
                <label for="">{{$i. '. ' .$pregunta}}</label>
                @foreach($respuestas as $respuesta)
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="{{$i}}" value="{{$respuesta->id}}" checked="checked">
                            <label>{{$respuesta->respuesta}}</label>
                        </div>
                    </div>
                @endforeach

            </div>
        @endforeach
        <button class="ui button enviar" type="submit">Enviar Respuestas</button>
    </form>
@endsection

@section('js-link')
    <script type="text/javascript" src="{{asset('js/empleadoIndex.js')}}"></script>
@endsection
