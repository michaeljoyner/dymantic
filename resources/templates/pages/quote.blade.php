@extends('dymanticbase')

@section('title')
	<title>Quote - Dymantic Design</title>
	@stop

@section('description')
	<meta name="description" content="Fill out a proposal to get a quote for your project, whether it is for web development, logo design or print media.">
	@stop

@section('head')
	@parent
	<meta property="CSRF-token" content="{{ Session::token() }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrapmin.css')}}">
	<style>
	    .nav-menu-list {
		  margin-top: 2em;
		}
	</style>
	@stop

@section('fbook')
	 <meta property="og:title" content="Quote - Dymantic Design">
     <meta property="og:description" content="Fill out a proposal to get a quote for your project, whether it is for web development, logo design or print media.">
     @stop

@section('content')
	<script type="text/template" id="temp">
		<p class="fum_name_title">File: <span class="fum_filename"></span></p>
		<div class="fum_imagebox">
			<img class="fum_fileimg" src="images/document-icon.png" alt="" width="100px" height="100px">
		</div>
		<div class="fum_infobox">
			<p>Status: <span class="fum_status">uploading</span></p>
			<div class="fum_progressbar_outer"><div class="fum_progressbar_inner"></div></div>
			<div class="fum_cancelbtn btn btn-info btn-xs">cancel</div>
		</div>
	</script>
	<script type="text/template" id="errorTemplate">
		<p class="fum_message"></p>
		<span class="fum_close-btn"><span class="glyphicon glyphicon-remove"></span></span>
	</script>
	@include('navmenu')
	<div class="body-section">
		<h1 id="quote_pageheader" class="blue page_header">get a quote</h1>
	</div>
	<div class="body-section wavy geosans">
		<p class="big">In order to give you a quote we'll need a bit of information first. Kindly fill out the form below, we will assess it immediately and get back to you with a quote in no time at all.</p>
	</div>
	{!! Form::open(array('url'=>url('/quickquote'), 'id'=>'proposal_form', 'class'=>'container-fluid', 'files'=>true)) !!}
		<h4 class="brief_subheader orange big">tell us a little about you</h4>
		<div class="row">
			<div class="col-md-5">
				<label class="control-label" for="name">Your name</label>
				{!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					<input type="text" name="name" value="{{ Input::old('name') }}" placeholder="Contact person's name" class="form-control">
				</div>
			</div>
			<div class="col-md-offset-2 col-md-5">
				<label class="control-label" for="email">Email address</label>
				{!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
					<input type="email" name="email" value="{{ Input::old('email') }}" placeholder="Contact email address" class="form-control">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<label class="control-label" for="company">Company</label>
				{!! $errors->first('company', '<span class="text-danger">:message</span>') !!}
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
					<input type="text" name="company" value="{{ Input::old('company') }}" placeholder="Company or organisation name" class="form-control">
				</div>
			</div>
			<div class="col-md-offset-2 col-md-5">
				<label class="control-label" for="country">Country</label>
				{!! $errors->first('country', '<span class="text-danger">:message</span>') !!}
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-flag"></span></span>
					<input type="text" name="country" value="{{ Input::old('country') }}" placeholder="Where in the world are you?" class="form-control">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<label class="control-label" for="phone">Phone number</label>
				{!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
					<input type="text" name="phone" value="{{ Input::old('phone') }}" placeholder="Contact number (or Skype name)" class="form-control">
				</div>
			</div>
			<div class="col-md-offset-2 col-md-5">
				<label class="control-label" for="budget">Budget</label>
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
					<select name="budget" placeholder="Where in the world are you?" class="form-control">
						<option>How much are you prepared to spend?</option>
						<option value="low" @if(Input::old('budget') === 'low'){{ "selected" }} @endif >Shoestring</option>
						<option value="medium" @if(Input::old('budget') === 'medium'){{ "selected" }} @endif >Moderate</option>
						<option value="high" @if(Input::old('budget') === 'high'){{ "selected" }} @endif >Let's break the bank</option>
					</select>
				</div>
			</div>
		</div>
		<h4 class="brief_subheader orange big">tell us all about your project</h4>
		<div class="row">
			<div class="col-md-12">
				<label class="control-label">Give us a general outline of your project, how soon you would like it completed, etc</label>
				{!! $errors->first('project', '<span class="text-danger">:message</span>') !!}
				<textarea name="project" class="form-control" rows="12">{{{ Input::old('project') }}}</textarea>
			</div>
		</div>
		<div class="row">
		@if(Session::has('uploadErrors'))
			@foreach(Session::get('uploadErrors') as $uploadError)
				<p class="text-danger">{{ $uploadError }}</p>
			@endforeach
		@endif
			<div class="col-md-9 file-select-area">
				<label for="prop_files"><span class="glyphicon glyphicon-upload"></span> Feel free to attach up to five images or documents you would like us to see, by using the button below. <span class="browse_btn opensans">Browse files</span>
					<input type="file" multiple="multiple" name="uploads[]" class="form-control" id="prop_files">
				</label>
				{!! $errors->first('uploads', '<span class="text-danger">:message</span>') !!}
			</div>
		</div>
		<div id="box"></div>

		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<button type="submit" id="submitbutton" class="btn btn-info form-control" name="submit">Send proposal</button>
			</div>
		</div>
	{!! Form::close()!!}
	@include('footer')
	@stop

@section('bodyscripts')
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/uploadi.min.js') }}"></script>
	<script type="text/javascript">
		var form = document.getElementById('proposal_form');
		var f = document.getElementById('prop_files');
		var b = document.getElementById('box');
		var man = new FileUploadManager(f, '/qquploads', b, 'temp', 'autouploads');
		if(man.supported) {
			form.onsubmit = function() {
				f.disabled = true;
				return true;
			};
		}
	</script>
	@stop