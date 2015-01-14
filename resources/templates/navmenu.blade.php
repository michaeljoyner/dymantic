<nav id="nav_menu2">
		<ul class="nav-menu-list darkgrey">
			@if(Request::path() === 'home' || Request::path() === '/')
			<li class="inactive inactive-home">HOME</li>
			@else
			<a href="{{ url('/') }}"><li class="active">HOME</li></a>
			@endif
			@if(Request::path() === 'services')
			<li class="inactive">SERVICES</li>
			@else
			<a href="{{ url('/services') }}"><li class="active">SERVICES</li></a>
			@endif
			@if(Request::path() === 'getstarted')
			<li class="inactive">GET STARTED</li>
			@else
			<a href="{{ url('/getstarted') }}"><li class="active">GET STARTED</li></a>
			@endif
			@if(Request::path() === 'quote')
			<li class="inactive">QUOTE</li>
			@else
			<a href="{{ url('/quote') }}"><li class="active">QUOTE</li></a>
			@endif
			@if(Request::path() === 'contact')
			<li class="inactive">CONTACT</li>
			@else
			<a href="{{ url('/contact') }}"><li class="active">CONTACT</li></a>
			@endif
		</ul>
	</nav>