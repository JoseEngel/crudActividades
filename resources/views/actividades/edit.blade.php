@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/actividades/'.$actividades->id ) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}

    @include('actividades.form',['modo'=>'Editar'])

</form>
</div>
@endsection

