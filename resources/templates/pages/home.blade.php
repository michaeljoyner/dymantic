@extends('dymanticbase')

@section('head')
	@parent
	<style type="text/css">
	@media (max-width: 480px) {
		#mysvg {
			top: 13em;
		}

		.servicebox {
			width: 20%;
			margin: 1em 4%;
		}
	}

	@media (min-width: 481px) and (max-width: 801px) {
		.servicebox {
			width: 18%;
			margin: 1em 7%;
		}
	}
	.inlinesvg .svg-fallback {
		display: none;
	}

	body {
		overflow-X: hidden;
		width: 100%;
	}


	#home_header {
		 
	}
	</style>
	@stop

@section('content')
	@include('svg.bubbles')
	<header id="home_header">
		<img src="{{ asset('images/Logo_complete.png') }}" alt="Dymantic Design logo">
	</header>
	@include('navmenu')
	<div id="pitch" class="wavy body-section geosans">
		<p class="big">We are a small innovative design agency primarily focused on visual and web design. Our principles are simple and effective - to offer creative solutions to our clients that give them the distinctive, competitive edge they desire and build lasting relationships based on communication, trust and understanding their needs.</p>
	</div>
	<div id="services" class="body-section">
		<h1 class="blue">services</h1>
		<div id="developbox" class="servicebox"><a href="{{ url('/services') }}" id="weblink">
		@include('svg.webicon')
		<img src="{{ asset('images/web.png') }}" alt="web service icon" class="svg-fallback">
		<p>WEB</p></a>
		</div>
		<div id="designbox" class="servicebox"><a href="{{ url('/services') }}" id="logolink">
		@include('svg.logoicon')
		<img src="{{ asset('images/logo.png') }}" alt="web service icon" class="svg-fallback">
		<p>LOGO</p></a>
		</div>
		<div id="printbox" class="servicebox"><a href="{{ url('/services') }}" id="printlink">
		@include('svg.printicon')
		<img src="{{ asset('images/print.png') }}" alt="web service icon" class="svg-fallback">
		<p>PRINT</p></a>
		</div>
		<div class="servicetext opensans blue" id="develop_spiel">
			<p>WEB DEVELOPMENT</p>
			<p>It may be the beautiful face of your organisation, the heart of your business, your voice or a meeting place. Whatever it is, it is never 'just a website'. Whatever the nature of your web project is, we would like to make it a reality. We understand that your site should not just be a pleasure to look at, but a pleasure to experience too, and we are committed to making that happen.</p>
			<a href="{{ url('/services') }}" class="full-service-link orange opensans">See services</a>
		</div>
		<div class="servicetext opensans blue" id="design_spiel">
			<p>LOGO DESIGN</p>
			<p>The logo is at the core of brand identity. It is the flag that flies high above your organisation and lets everyone know who you are and what you strive to be. A successful logo is timeless, universal and durable. And we understand this. We know you want to swell with pride as you look upon your logo and show it off to others and it is our prime concern is to achieve this.</p>
			<a href="{{ url('/services') }}" class="full-service-link orange opensans">See services</a>
		</div>
		<div class="servicetext opensans blue" id="print_spiel">
			<p>PRINT DESIGN</p>
			<p>Print design such as brochures, business cards, menus, posters, packaging, adverts and banners need to be functional and eye-catching. Your brand identity is solidified through this material and it's important that there is a strong correspondence while keeping things fresh and interesting. For any design material you require, we are here to help.</p>
			<a href="{{ url('/services') }}" class="full-service-link orange opensans">See services</a>
		</div>
		<div id="service-anim-nav">
			<div class="anim-nav-box" id="web-nav">@include('svg.webicon')</div>
			<div class="anim-nav-box" id="logo-nav">@include('svg.logoicon')</div>
			<div class="anim-nav-box" id="print-nav">@include('svg.printicon')</div>
		</div>
	</div>
	<div id="about" class="wavy body-section opensans">
		<h1 class="white">about</h1>
		<p>Dymantic Design is the product of two minds that were ready to explore their talents and take the step from dreaming to realising. At the forefront we have a graphic designer who loves all that is clean and catchy with just a hint of dare and flare, and a web designer who is devoted to the ongoing development of web intricacies. Under the layers you'll find a team that are enthusiastic  problem solvers, ready to help their clients stand out and empower their identity through effective design.</p>
		<p>Curious about our name? The word 'dymantic' stems from 'deimatic' which is the ability of an animal to change it's pattern or appearance in order to react to a sudden change in the environment, such as a threat from a predator. This can be seen in the octopus, for example, which will change the colour of its skin to bright colors with highly contrasting spots to appear dangerous and intimidating. We, as designers, have a deep appreciation for this fascinating phenomenon because of the way that it adapts to its surroundings in an intensely proactive way which we aspire to when dealing with clients from all industries and backgrounds, their competitors and the ever-changing world we live in.</p>
	</div>
	@include('footer')
	@stop

@section('bodyscripts')
	<script type="text/javascript">
		function hasParent(el, parentId, grandparentId) {
			var found = false;
			if(el.id === parentId) {
				found = true;
			}
			if(!found && el.parentNode.id === parentId) {
				found = true;
			} else if(!found && el.parentNode.id === grandparentId || el.parentNode.tagName === 'body') {
				found = false;
			} else if(!found) {
				found = hasParent(el.parentNode, parentId, grandparentId);
			}
			return found;
		}
		var serviceAnimator = {};
		
		serviceAnimator.init = function() {
			serviceAnimator.serviceLinks = {};
			serviceAnimator.serviceLinks.weblink = document.getElementById('weblink');
			serviceAnimator.serviceLinks.logolink = document.getElementById('logolink');
			serviceAnimator.serviceLinks.printlink = document.getElementById('printlink');
			//nav-icons
			serviceAnimator.navIcons = {};
			serviceAnimator.navIcons.web = document.getElementById('web-nav');
			serviceAnimator.navIcons.logo = document.getElementById('logo-nav');
			serviceAnimator.navIcons.print = document.getElementById('print-nav');
			serviceAnimator.outerBox = document.getElementById('services');
			serviceAnimator.addListeners();
		};
		serviceAnimator.serviceSelect = function(ev) {
			ev.preventDefault();
			console.log(ev);
			if(hasParent(ev.target, 'developbox', 'services')) {
				serviceAnimator.outerBox.classList.toggle('peeking');
				serviceAnimator.outerBox.classList.remove('designing');
				serviceAnimator.outerBox.classList.remove('printing');
				serviceAnimator.outerBox.classList.toggle('developing');	
			} else if(hasParent(ev.target, 'designbox', 'services')) {
				serviceAnimator.outerBox.classList.toggle('peeking');
				serviceAnimator.outerBox.classList.remove('developing');
				serviceAnimator.outerBox.classList.remove('printing');
				serviceAnimator.outerBox.classList.toggle('designing');
			} else if(hasParent(ev.target, 'printbox', services)) {
				serviceAnimator.outerBox.classList.toggle('peeking');
				serviceAnimator.outerBox.classList.remove('developing');
				serviceAnimator.outerBox.classList.remove('designing');
				serviceAnimator.outerBox.classList.toggle('printing');
			}
			
		};

		serviceAnimator.changeService = function(ev) {
			if(hasParent(ev.target, 'web-nav', 'service-anim-nav')) {
				if(serviceAnimator.outerBox.classList.contains('developing')) {
					serviceAnimator.outerBox.classList.toggle('peeking');
					serviceAnimator.outerBox.classList.remove('developing');
				} else {
					serviceAnimator.outerBox.classList.remove('designing');
					serviceAnimator.outerBox.classList.remove('printing');
					serviceAnimator.outerBox.classList.add('developing');
				}
			} else if(hasParent(ev.target, 'logo-nav', 'service-anim-nav')) {
				if(serviceAnimator.outerBox.classList.contains('designing')) {
					serviceAnimator.outerBox.classList.toggle('peeking');
					serviceAnimator.outerBox.classList.remove('designing');
				} else {
					serviceAnimator.outerBox.classList.remove('developing');
					serviceAnimator.outerBox.classList.remove('printing');
					serviceAnimator.outerBox.classList.add('designing');
				}
			} else if(hasParent(ev.target, 'print-nav', 'service-anim-nav')) {
				if(serviceAnimator.outerBox.classList.contains('printing')) {
					serviceAnimator.outerBox.classList.toggle('peeking');
					serviceAnimator.outerBox.classList.remove('printing');
				} else {
					serviceAnimator.outerBox.classList.remove('designing');
					serviceAnimator.outerBox.classList.remove('developing');
					serviceAnimator.outerBox.classList.add('printing');
				}
			}
		};

		serviceAnimator.addListeners = function() {
			serviceAnimator.serviceLinks.weblink.addEventListener('click', serviceAnimator.serviceSelect, false);
			serviceAnimator.serviceLinks.logolink.addEventListener('click', serviceAnimator.serviceSelect, false);
			serviceAnimator.serviceLinks.printlink.addEventListener('click', serviceAnimator.serviceSelect, false);

			serviceAnimator.navIcons.web.addEventListener('click', serviceAnimator.changeService, false);
			serviceAnimator.navIcons.logo.addEventListener('click', serviceAnimator.changeService, false);
			serviceAnimator.navIcons.print.addEventListener('click', serviceAnimator.changeService, false);
		};
		// if(Modernizr.csstransforms3d) {
		// 	serviceAnimator.init();
		// }
	</script>
	@stop