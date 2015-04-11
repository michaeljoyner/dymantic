@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <h1>Create a User</h1>
    @include('admin.partials.forms.register')
@endsection