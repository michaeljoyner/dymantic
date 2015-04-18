@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <div class="container client-container">
        <a name="Add" class="floating-button" href="/admin/clients/create">+</a>
        <h1 class="content-header">Our Clients</h1>
        @foreach($clients as $client)
            @include('admin.partials.clientview', $client)
        @endforeach
    </div>
@endsection