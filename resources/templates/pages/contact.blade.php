@extends('dymanticbase')

@section('title')
	<title>Contact us - Dymantic Design</title>
	@stop

@section('description')
	<meta name="description" content="Contact Dymantic design, or find our contact information, and get in touch about web development, logo design or print media.">
	@stop

@section('head')
	@parent
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrapmin.css')}}">
	<style type="text/css">
		.nav-menu-list {
			margin-top: 2em;
		}
	</style>
	@stop

@section('fbook')
	 <meta property="og:title" content="Contact us - Dymantic Design">
     <meta property="og:description" content="Contact Dymantic design, or find our contact information, and get in touch about web development, logo design or print media.">
     @stop

@section('content')
	@include('navmenu')
	<div class="body-section geosans">
		<h1 id="contact_pageheader" class="blue page_header">contact us</h1>
	</div>
	<div class="body-section wavy geosans">
		<p class="big">We would love to hear from you! Please do not hesitate to contact us with any questions you may have, no matter how big or small.</p>
	</div>
	{!! Form::open(array('url'=>url('/contact'), 'files'=> false, 'id'=>'contactform')) !!}
	<h4 class="brief_subheader orange big">send us a message</h4>
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
				<input type="email" name="email" value="{{ Input::old('email') }}" placeholder="Contact email address" class="form-control" required>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label class="control-label">Your message</label>
			{!! $errors->first('message', '<span class="text-danger">:message</span>') !!}
			<textarea name="message" class="form-control" rows="12">{{{ Input::old('message') }}}</textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<button type="submit" id="submitbutton" class="btn btn-info form-control" name="submit">Send message</button>
		</div>
	</div>
	{!! Form::close()!!}
	<div class="body-section wavy geosans">
		<p class="big">or feel free to contact us by using our details below</p>
		<a href="mailto:&#099;&#111;&#110;&#116;&#097;&#099;&#116;&#064;&#100;&#121;&#109;&#097;&#110;&#116;&#105;&#099;&#100;&#101;&#115;&#105;&#103;&#110;&#046;&#099;&#111;&#109;"><p class="contactdetail-mail contactdetail opensans big"><span class="contact-icon"><span class="glyphicon glyphicon-envelope"></span></span> &#099;&#111;&#110;&#116;&#097;&#099;&#116;&#064;&#100;&#121;&#109;&#097;&#110;&#116;&#105;&#099;&#100;&#101;&#115;&#105;&#103;&#110;&#046;&#099;&#111;&#109;</p></a>
		<p class="contactdetail contactdetail-phone opensans big"><span class="contact-icon"><span class="glyphicon glyphicon-phone"></span></span> +(886) 98 9621042</p>
	</div>
	@include('footer')
	@stop