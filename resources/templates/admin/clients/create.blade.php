@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <h1>New Client</h1>
    @include('admin.partials.forms.client')
@endsection