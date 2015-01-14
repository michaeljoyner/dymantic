<footer class="footer opensans">
		<div class="footer_wrapper">
		<ul id="site_links" class="footlist orange">
			@if(Request::path() !== 'home' && Request::path() !== '/')
			<a href="{{ url('/') }}"><li>HOME</li></a>
			@endif
			@if(Request::path() !== 'services')
			<a href="{{ url('/services') }}"><li>SERVICES</li></a>
			@endif
			@if(Request::path() !== 'getstarted')
			<a href="{{ url('/getstarted') }}"><li>GET STARTED</li></a>
			@endif
			@if(Request::path() !== 'quote')
			<a href="{{ url('/quote') }}"><li>QUOTE</li></a>
			@endif
			@if(Request::path() !== 'contact')
			<a href="{{ url('/contact') }}"><li>CONTACT</li></a>
			@endif
		</ul>
		
		<p id="legal" itemscope itemtype="http://schema.org/LocalBusiness">
			<span itemprop="name">DYMANTIC DESIGN </span><span>&middot;</span><span itemprop="description"> WEB &amp; GRAPHIC DESIGN </span><span>&middot;</span><span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span itemprop="addressLocality"> TAICHUNG,</span><span itemprop="addressCountry"> TAIWAN</span></span>
			<span> &copy; 2014</span>
		</p>
		</div>
	</footer>