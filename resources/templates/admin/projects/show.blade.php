@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <div class="client-page-header clearfix">
            <h1 class="content-header">{{ $project->name }}</h1>
            <button class="floating-button fb-smalltext" data-toggle="modal" data-target="#deleteProjectModal"><span class="fa fa-trash"></span></button>
            <a href="/admin/clients/{{ $project->client->slug }}/project/edit/{{ $project->id }}" class="floating-button fb-smalltext"><span class="fa fa-edit"></span></a>
        </div>
        <p>{{ $project->description }}</p>
        <hr class="content-divider"/>
        <div class="tasks-container">
            <h1 class="content-header">Tasks</h1>
            <a name="Task" class="floating-button" href="/admin/projects/{{ $project->id }}/task/create">+</a>
            @foreach($project->tasks as $task)
                @include('admin.partials.taskcard', $task)
            @endforeach
        </div>
    </div>
    {{--bootstrap modal--}}
    <div class="modal fade dymantic-modal" id="deleteProjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Project</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove {{ $project->name }} from the system? It is permanent.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {!! Form::open(['url' => 'admin/projects/'.$project->id, 'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-primary">Delete</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection