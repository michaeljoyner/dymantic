@extends('admin.base')

@section('content')
    <h1>{{ $client->name }}</h1>
    <p>Contact Person: {{ $client->contact_person }}</p>
    <p>Email: {{ $client->contact_email }}</p>
    <p>{{ $client->description }}</p>
    <a href="/admin/clients/{{ $client->slug }}/project/create">Project</a>
    <h1>Projects</h1>
    @foreach($client->projects as $project)
        <h2>{{ $project->created_at->diffForHumans() }}</h2>
        <p>{{ $project->description }}</p>
    @endforeach
@endsection