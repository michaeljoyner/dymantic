@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <header class="client-page-header clearfix">
            <h1 class="content-header">The Briefs</h1>
        </header>
        <hr class="content-divider"/>
        @foreach($generalBriefs as $generalBrief)
            @include('admin.partials.generalbriefcard', ['generalBrief', $generalBrief])
        @endforeach
    </div>
@endsection