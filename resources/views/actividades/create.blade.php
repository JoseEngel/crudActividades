@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/actividades') }}" method="post">

    @csrf
    @include('actividades.form',['modo'=>'Crear'])


</form>
</div>
@endsection
