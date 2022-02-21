@extends('layouts.app')
@section('content')
<div class="container">


    @if(Session::has('mensaje'))
    <div class="alert-success" role="alert">
        {{ Session::get('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif




<a href="{{ url('actividades/create') }}" class="btn btn-success">Registar Nueva Actividad</a>
<br/>
    <br/>
<table class="table table-striped table-hover table-bordered caption-top">

    <caption>List of activities</caption>
    <thead class="thead-light">
    <tr>
        <th>#</th>
        <th>Tarea</th>
        <th>Description</th>
        <th>Status</th>
        <th>start_date</th>
        <th>end_date</th>
        <th>Acciones</th>
    </tr>
    </thead>

    <tbody>
    @foreach( $actividad as $actividades)
    <tr>
        <td>{{ $actividades-> id}}</td>
        <td>{{ $actividades-> Tarea}}</td>
        <td>{{ $actividades-> Description}}</td>
        <td>{{ $actividades-> Status}}</td>
        <td>{{ $actividades-> start_date}}</td>
        <td>{{ $actividades-> end_date}}</td>
        <td>
            <a href="{{ url('/actividades/'.$actividades->id.'/edit') }}" class="btn btn-warning">
                Editar
            </a>
            |
            <form action="{{ url('/actividades/'.$actividades->id) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE')}}
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Eliminar')" value="Borrar">
            </form>
        </td>
    </tr>
    @endforeach

    </tbody>

</table>
    <div class="d-flex justify-content-center">
        {!! $actividad->links() !!}
    </div>
</div>
@endsection
