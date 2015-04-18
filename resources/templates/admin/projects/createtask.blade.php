@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <h1 class="content-header">Create a task</h1>
        <hr class="content-divider"/>
        @include('admin.partials.forms.task', $project)
    </div>
@endsection