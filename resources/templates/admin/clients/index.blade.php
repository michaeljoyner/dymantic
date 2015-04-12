@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <a href="/admin/clients/create">Add</a>
        <h1>Our Clients</h1>
        @foreach($clients as $client)
            <h2>{{ $client->name }}</h2>
        @endforeach
    </div>
@endsection