@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <h1 class="content-header">Start Something New...</h1>
        <hr class="content-divider"/>
        @include('admin.partials.forms.newproject', ['client' => $client, 'url' => 'admin/projects/edit/'.$project->id, 'submitText' => 'Save Changes'])
    </div>
@endsection