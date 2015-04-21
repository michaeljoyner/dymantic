@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <header class="client-page-header clearfix">
            <h1 class="content-header pull-left">A Brief from {{ $generalBrief->company }}</h1>
            @if(! $generalBrief->converted)
                <a class="floating-button pull-right" href="/admin/briefs/{{ $generalBrief->id }}/convertnew">+</a>
            @else
                <span class="pull-right"><span class="fa fa-check fa-4x"></span></span>
            @endif
        </header>
        <ul class="task-vitals brief-vitals">
            <li>
                <span class="fa fa-suitcase"></span><span> {{ $generalBrief->industry }}</span>
            </li>
            <li>
                <span class="fa fa-globe"></span><span> {{ $generalBrief->current_website }}</span>
            </li>
            <li>
                <span class="fa fa-user"></span><span> {{ $generalBrief->contact_person }}</span>
            </li>
            <li>
                <span class="fa fa-envelope"></span><span> {{ $generalBrief->email }}</span>
            </li>
        </ul>
        <hr class="content-divider"/>
        <div class="row">
            <div class="col-md-4 brief-client-outline">
                <h3>Our Background</h3>
                <p>{{ $generalBrief->background }}</p>
            </div>
            <div class="col-md-4 brief-client-outline">
                <h3>Our target market</h3>
                <p>{{ $generalBrief->reaction }}</p>
            </div>
            <div class="col-md-4 brief-client-outline">
                <h3>Us in a nutshell</h3>
                <p>{{ $generalBrief->nutshell }}</p>
            </div>
        </div>
        <ul class="nav nav-tabs task-tab-bar" role="tablist" id="subBriefTabs">
            @if($generalBrief->logoBriefs->count())
                <li role="presentation">
                    <a href="#logo" aria-controls="logo" role="tab" data-toggle="tab">Logo Brief</a>
                </li>
            @endif
            @if($generalBrief->siteBriefs->count())
                <li role="presentation">
                    <a href="#website" aria-controls="website" role="tab" data-toggle="tab">Web Brief</a>
                </li>
            @endif
            @if($generalBrief->printBriefs->count())
                    <li role="presentation">
                        <a href="#print" aria-controls="print" role="tab" data-toggle="tab">Print Brief</a>
                    </li>
            @endif
        </ul>

        <div class="tab-content">
            @if($generalBrief->logoBriefs->count())
            <div role="tabpanel" class="task-tab-content tab-pane fade in active" id="logo">
               @include('admin.briefs.logobrief', ['logoBrief' => $generalBrief->logoBriefs->first()])
            </div>
            @endif
            @if($generalBrief->siteBriefs->count())
            <div role="tabpanel" class="task-tab-content tab-pane fade" id="website">
                @include('admin.briefs.webbrief', ['siteBrief' => $generalBrief->siteBriefs->first()])
            </div>
            @endif
            @if($generalBrief->printBriefs->count())
            <div role="tabpanel" class="task-tab-content tab-pane fade" id="print">
                @include('admin.briefs.printbrief', ['printBrief' => $generalBrief->printBriefs->first()])
            </div>
            @endif
        </div>
    </div>

@endsection

@section('bodyscripts')
    @parent
    <script>
        $(function () {
            $('#subBriefTabs a:last').tab('show')
        })
    </script>
@endsection