@extends('dymanticbase')

@section('title')
	<title>Services - Dymantic Design</title>
	@stop

@section('description')
	<meta name="description" content="Dymantic Design offers services in three broad categories: web development, logo design and print media.">
	@stop

@section('head')
	@parent
	<style>
	.nav-menu-list {
      margin-top: 2em;
    }
	</style>
	@stop

@section('fbook')
	 <meta property="og:title" content="Services - Dymantic Design">
     <meta property="og:description" content="We offer innovative services in three broad categories: web development, logo design and print media.">
     @stop

@section('content')
	@include('navmenu')
	<div id="services_header" class="body-section">
		<h1 class="blue page_header">our services</h1>
		<div id="newship">
			@include('svg.newyacht')
		</div>
	</div>
	<div class="wavy geosans body-section">
		<p class="big">Our services are broken down into three categories - web, logos and print media. Feel free to contact us if you are not sure what you are looking for.</p>
	</div>
	<div class="body-section opensans">
		<div class="service-section">
			<div class="service-icon-container">
				<div class="icon-box">
					@include('svg.webicon')
					<img src="{{ asset('images/web.png') }}" alt="web service icon" class="svg-fallback">
					<p class="darkgrey">WEB</p>
				</div>
			</div>
			<div class="service-writeup darkgrey">
				<p>It may be the beautiful face of your organisation, the heart of your business, your voice or a meeting place. Whatever it is, it is never 'just a website'. Whatever the nature of your web project is, we would like to make it a reality. We understand that your site should not just be a pleasure to look at, but a pleasure to experience too, and we are committed to making that happen.</p>
			</div>
		</div>
	</div>
	<div class="body-section opensans wavy">
		<div class="service-section">
			<div id="service-logo-box"class="service-icon-container">
				<div class="icon-box">
					@include('svg.logoreverseicon')
					<img src="{{ asset('images/logoinv.png') }}" alt="web service icon" class="svg-fallback">
					<p class="white">LOGO</p>
				</div>
			</div>
			<div id="service-logo-text" class="service-writeup">
				<p>The logo is at the core of brand identity. It is the flag that flies high above your organisation and lets everyone know who you are and what you strive to be. A successful logo is timeless, universal and durable. And we understand this. We know you want to swell with pride as you look upon your logo and show it off to others and it is our prime concern is to achieve this.</p>
			</div>
		</div>
	</div>
	<div class="body-section opensans">
		<div class="service-section">
			<div class="service-icon-container">
				<div class="icon-box">
					@include('svg.printicon')
					<img src="{{ asset('images/print.png') }}" alt="web service icon" class="svg-fallback">
					<p class="darkgrey">PRINT</p>
				</div>
			</div>
			<div class="service-writeup darkgrey">
				<p>Print design such as brochures, business cards, menus, posters, packaging, adverts and banners need to be functional and eye-catching. Your brand identity is solidified through this material and it's important that there is a strong correspondence while keeping things fresh and interesting. For any design material you require, we are here to help.</p>
			</div>
		</div>
	</div>
	<div class="wavy body-section">
		<div id="get_started_btn">
			<a href="{{ url('/getstarted') }}"><p class="geosans big">I'm ready to get started!</p></a>
		</div>
	</div>
	@include('footer')
	@stop