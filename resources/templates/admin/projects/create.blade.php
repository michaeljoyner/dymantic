@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <h1>Start Something New...</h1>
        @include('admin.partials.forms.newproject', $client)
    </div>
@endsection