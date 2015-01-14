@extends('dymanticbase')

@section('head')
	@parent
	<style>
	.nav-menu-list {
    	margin-top: 2em;
    }
	</style>
	@stop

@section('content')
	@include('navmenu')
	<div class="body-section geosans">
		<h1 id="thanks_pageheader" class="blue">thank you</h1>
	</div>
	<div class="body-section wavy geosans">
		@if(! Session::has('thanks_note'))
		<p class="big">Thank you for contacting us. We will reply to you shortly.</p>
		@else
		<p class="big">{{ Session::get('thanks_note') }}</p>
		@endif
	</div>
	@stop