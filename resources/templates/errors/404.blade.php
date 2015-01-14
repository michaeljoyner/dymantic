@extends('dymanticbase')

@section('title')
	<title>Oh dear!</title>
	@stop

@section('head')
	@parent
	<link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
	<style type="text/css">
		.nav-menu-list {
			margin-top: 2em;
		}
	</style>
	@stop

@section('content')
	@include('navmenu')
	<div class="body-section geosans">
		<h1 id="oops_pageheader" class="blue page_header">Oh dear!</h1>
	</div>
	<div class="body-section geosans wavy">
		<p class="big">Oops! We seem to have got our tentacles in a tangle. We are experiencing technical difficulties, and are working on the problem. We apologise for the inconvenience.</p>
	</div>
	@stop