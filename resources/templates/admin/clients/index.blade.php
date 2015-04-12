@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <div class="container client-container">
        <a href="/admin/clients/create">Add</a>
        <h1>Our Clients</h1>
        @foreach($clients as $client)
            @include('admin.partials.clientview', $client)
        @endforeach
    </div>
@endsection