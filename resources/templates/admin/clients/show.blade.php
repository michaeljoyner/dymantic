@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <header class="client-page-header clearfix">
            <h1 class="content-header">{{ $client->name }}</h1>
            <button class="floating-button fb-smalltext" data-toggle="modal" data-target="#deleteClientModal"><span class="fa fa-trash"></span></button>
            <a href="/admin/clients/edit/{{ $client->slug }}" class="floating-button fb-smalltext"><span class="fa fa-edit"></span></a>
        </header>
        <div class="row client-outline">
            <div class="col-md-9 client-detail">
                <p><span class="fa fa-user"></span><span> {{ $client->contact_person }}</span></p>
                <p><span class="fa fa-envelope"></span><span> {{ $client->contact_email }}</span></p>
                <p><span class="fa fa-globe"></span><span> {{ $client->website }}</span></p>
            </div>
            <div class="col-md-3 client-image-box">
                <img src="{{ asset($client->present()->clientImage()) }}" alt=""/>
            </div>

        </div>
        <p class="client-blurb">{{ $client->name }} has been operating in the {{ $client->industry }} industry since {{ $client->operating_since }}</p>
        <p class="client-description">{!! $client->description !!}</p>
        <hr class="content-divider"/>
        <div class="project-container">
            <h1 class="content-header">Projects</h1>
            @foreach($client->projects as $project)
                @include('admin.partials.projectview', $project)
            @endforeach
            <a class="floating-button" name="Project" href="/admin/clients/{{ $client->slug }}/project/create">+</a>
        </div>
    </div>
    {{--bootstrap modal--}}
    <div class="modal fade dymantic-modal" id="deleteClientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Client</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove {{ $client->name }} from the system? It is permanent.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {!! Form::open(['url' => 'admin/clients/'.$client->id, 'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-primary">Delete</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection