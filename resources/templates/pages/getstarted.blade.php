@extends('dymanticbase')

@section('title')
	<title>Get Started - Dymantic Design</title>
	@stop

@section('description')
	<meta name="description" content="Fill in a brief to let us get started on your project, whether it is for web development, logo design or print media">
	@stop

@section('head')
	@parent
	<meta property="CSRF-token" content="{{ Session::token() }}"/>
	<link rel="stylesheet" href="{{ asset('css/bootstrapmin.css') }}"/>
	<style type="text/css">
	.nav-menu-list {
	  margin-top: 2em;
	}

	#develop, #design, #print {
		width: 80%;
		height: 80%;
	}
	</style>
	@stop

@section('fbook')
	 <meta property="og:title" content="Get Started - Dymantic Design">
     <meta property="og:description" content="Want to get started on your project? Whether it is for a web project, logo design or print media, here you can fill out a brief to get started.">
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
		<h1 id="getstarted_header" class="blue page_header">let's get started</h1>
	</div>
	<div class="wavy body-section geosans">
		<p class="big">This is where it all begins. By selecting the services you require a questionnaire relating to each service will be shown. You just need to fill in the information and try to communicate your vision and ideas so that we can be on the same page as you. But don't worry if don't have too many ideas, that's what we're here for. </p>
	</div>
	<div class="body-section select-service-section">
		<h4 class="brief_subheader orange big">Please select one or more of the services you require</h4>
		<div class="service-select unchosen" id="webservice">
			<p class="ss-label opensans blue">WEB</p>
			<div class="ss-icon-holder">
				@include('svg.webicon')
				<img src="{{ asset('images/web.png') }}" alt="web service icon" class="svg-fallback">
			</div>
			<div class="ss-checkbox-holder">
				<div class="ss-checkbox"><img src="{{ asset('images/dot.png') }}"></div>
			</div>
		</div>
		<div class="service-select unchosen" id="logoservice">
			<p class="ss-label opensans blue">LOGO</p>
			<div class="ss-icon-holder">
				@include('svg.logoicon')
				<img src="{{ asset('images/logo.png') }}" alt="web service icon" class="svg-fallback">
			</div>
			<div class="ss-checkbox-holder">
				<div class="ss-checkbox"><img src="{{ asset('images/dot.png') }}"></div>
			</div>
		</div>
		<div class="service-select unchosen" id="printservice">
			<p class="ss-label opensans blue">PRINT</p>
			<div class="ss-icon-holder">
				@include('svg.printicon')
				<img src="{{ asset('images/print.png') }}" alt="web service icon" class="svg-fallback">
			</div>
			<div class="ss-checkbox-holder">
				<div class="ss-checkbox"><img src="{{ asset('images/dot.png') }}"></div>
			</div>
		</div>
	</div>

	{!! Form::open(array('url'=>url('/brief'), 'files'=> true, 'id'=>'logobriefform')) !!}

	<select id="brief_type_select" name="brief_type">
		<option value="0" @if(Input::old('brief_type') === "0") {{ 'selected'}} @endif>...</option>
		<option value="1" @if(Input::old('brief_type') === "1") {{ 'selected'}} @endif >Logo</option>
		<option value="2" @if(Input::old('brief_type') === "2") {{ 'selected'}} @endif>Website</option>
		<option value="4" @if(Input::old('brief_type') === "4") {{ 'selected'}} @endif>Print Media</option>
		<option value="3" @if(Input::old('brief_type') === "3") {{ 'selected'}} @endif>Logo and Website</option>
		<option value="5" @if(Input::old('brief_type') === "5") {{ 'selected'}} @endif>Logo and Print Media</option>
		<option value="6" @if(Input::old('brief_type') === "6") {{ 'selected'}} @endif>Website and Print Media</option>
		<option value="7" @if(Input::old('brief_type') === "7") {{ 'selected'}} @endif>Everything</option>
	</select>
		<div id="general_brief">
		<h2 class="brief_header blue geosans">general information</h2>
		<h4 class="brief_subheader orange big opensans">don't hold back - the biggest ideas can come from the littlest things</h4>
		<div class="row">
			<div class="col-md-5">
				<label for="contact_person" class="control-label">Contact name</label>
				{!! $errors->first('contact_person', '<span class="text-danger">:message</span>') !!}
				<input type="text" name="contact_person" value="{{ Input::old('contact_person') }}" placeholder="Name of person to contact" class="form-control">
			</div>
			<div class="col-md-offset-2 col-md-5">
					<label for="email" class="control-label">Email</label>
					{!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
					<input type="email" name="email" value="{{ Input::old('email') }}" placeholder="Contact email address" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<label for="company" class="control-label">Name of Company/Organisation/Group</label>
				{!! $errors->first('company', '<span class="text-danger">:message</span>') !!}
				<input type="text" name="company" value="{{ Input::old('company') }}" placeholder="The name of your organisation" class="form-control">
			</div>
			<div class="col-md-offset-2 col-md-5">
					<label for="industry" class="control-label">Industry</label>
					{!! $errors->first('industry', '<span class="text-danger">:message</span>') !!}
					<input type="text" name="industry" value="{{ Input::old('industry') }}" placeholder="What industry are you in?" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<label for="since" class="control-label">How long have you been operating?</label>
				{!! $errors->first('since', '<span class="text-danger">:message</span>') !!}
				<div class="input-group">
					<span class="input-group-addon">We have been operating since </span>
					<input type="text" name="since" value="{{ Input::old('since') }}" placeholder="Enter year" class="form-control">
				</div>
			</div>
			<div class="col-md-offset-2 col-md-5">
				<label class="control-label" for="current_website">What is your current website?</label>
				{!! $errors->first('current_website', '<span class="text-danger">:message</span>') !!}
				<input type="text" name="current_website" value="{{ Input::old('current_website') }}" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<label for="background">Please tell us a bit about your company or organisation.</label>
				{!! $errors->first('background', '<span class="text-danger">:message</span>') !!}
				<textarea class="form-control" name="background" rows="4" placeholder="Give us some background to it, what products or services you offer, who you are influenced by, etc.">{{{ Input::old('background') }}}</textarea>
			</div>
			<div class="col-md-offset-2 col-md-5">
				<label for="reaction">Who is your target market and what reaction do you hope they will have?</label>
				{!! $errors->first('reaction', '<span class="text-danger">:message</span>') !!}
				<textarea class="form-control" name="reaction" rows="4" placeholder="Who are you targeting and what impression do you want them to have of you?">{{{ Input::old('reaction') }}}</textarea>
			</div>
		</div>

		<div class="row">
			<div class="col-md-5">
				<label for="nutshell">What three (or more) words describe your company?</label>
				{!! $errors->first('nutshell', '<span class="text-danger">:message</span>') !!}
				<textarea class="form-control" name="nutshell" rows="4" placeholder="" resize="vertical">{{{ Input::old('nutshell') }}}</textarea>
			</div>
		</div>
	</div>
	<div id="logo_brief">
		<h2 class="brief_header blue geosans">so you want a logo...</h2>
		<h4 class="brief_subheader orange big opensans">please answer the following questions with as much detail as you can</h4>
		<div class="row radiorow_outer">
			<label class="control-label" for="haslogo">Do you have an existing logo?</label>
			<div class="row radiorow_inner">
				<div class="col-md-6"><label><input type="radio" name="haslogo" value="0" @if(Input::old('haslogo') === '0'){{ "checked" }} @endif > No, I dont have a logo</label></div>
				<div class="col-md-6"><label><input type="radio" name="haslogo" value="1" @if(Input::old('haslogo') === '1'){{ "checked" }} @endif > Yes, I have a logo</label></div>
			</div>
		</div>
		<div class="row file-select-area">
				@if(Session::has('uploadErrors'))
        			@foreach(Session::get('uploadErrors') as $uploadError)
        				<p class="text-danger">{{ $uploadError }}</p>
        			@endforeach
        		@endif
			<label id="logoselect_label" for="logoselect"><span class="glyphicon glyphicon-record"></span> If you have an existing logo, please attach an image or images of it here. <span class="browse_btn opensans">Browse files</span>
				<input type="file" class="form-control" name="logo[]" id="logoselect" multiple="multiple">
			</label>
			{!! $errors->first('logo', '<span class="text-danger">:message</span>') !!}
		</div>
		<div id="logo_upload_prog">

		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="logocolor">Does your company have a colour scheme you want the logo to follow?</label>
				{!! $errors->first('logocolours', '<span class="text-danger">:message</span>') !!}
				<textarea class="form-control" name="logocolours" rows="4" placeholder="If specific CMYK/RGB/HEX/PANTONE colours are used, please include them">{{{ Input::old('logocolours') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="logodirection">Is there a certain direction you want your logo to go in?</label>
				{!! $errors->first('logodirection', '<span class="text-danger">:message</span>') !!}
				<textarea class="form-control" name="logodirection" rows="6" placeholder="This is the place for you to include any specific ideas or imagery">{{{ Input::old('logodirection') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="logorestrictions">Are there any restrictions?</label>
				{!! $errors->first('logorestrictions', '<span class="text-danger">:message</span>') !!}
				<textarea class="form-control" name="logorestrictions" rows="6" placeholder="This is where you tell us if there is something your logo MUST include, or must NOT include. For example, you require a specific font to be used, or want a specific image. On the other hand, there may be something you do not want to see in your logo.">{{{ Input::old('logorestrictions') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="logorequirements">What are your final requirements?</label>
				{!! $errors->first('logorequirements', '<span class="text-danger">:message</span>') !!}
				<textarea class="form-control" name="logorequirements" rows="6" placeholder="What do you need to receive from us?">{{{ Input::old('logorequirements') }}}</textarea>
			</div>
		</div>
	</div>
	<div id="website_brief">
		<h2 class="brief_header blue geosans">so you want a website...</h2>
		<h4 class="brief_subheader orange big opensans">Domain and hosting details</h4>
		<div class="row radiorow_outer">
			<label class="control-label">Do you have your own domain? <span class="mytooltip" data-toggle="tooltip" data-placement="top" title="A domain is simply the website's address, such as www.example.com"><span class="glyphicon glyphicon-question-sign"></span></span></label>
			{!! $errors->first('hasdomain', '<span class="text-danger">:message</span>') !!}
			<div class="row radiorow_inner">
				<div class="col-md-4"><label><input type="radio" name="hasdomain" value="0" @if(Input::old('hasdomain') === '0'){{ "checked" }} @endif > No, I would like you to do that for me.</label></div>
				<div class="col-md-4"><label><input type="radio" name="hasdomain" value="1" @if(Input::old('hasdomain') === '1'){{ "checked" }} @endif > No, but i will get it myself.</label></div>
				<div class="col-md-4"><label><input type="radio" name="hasdomain" value="2" @if(Input::old('hasdomain') === '2'){{ "checked" }} @endif > Yes, I already have one.</label></div>
			</div>
		</div>
		<div class="row">
			<label class="control-label" for="domain">If you have you own domain, please enter it, or if you want one, what domain would you like?</label>
			{!! $errors->first('domain', '<span class="text-danger">:message</span>') !!}
			<div class="col-md-6">
				<input type="text" name="domain" value="{{ Input::old('domain') }}" placeholder="your domain name" class="form-control">
			</div>
		</div>
		<div class="row radiorow_outer">
			<label class="control-label" for="hosting">Do you have your own hosting?</label>
			{!! $errors->first('hosting', '<span class="text-danger">:message</span>') !!}
			<div class="row radiorow_inner">
				<div class="col-md-4"><label><input type="radio" name="hosting" value="0" @if(Input::old('hosting') === '0'){{ "checked" }} @endif > No, I would like you to organise that for me.</label></div>
				<div class="col-md-4"><label><input type="radio" name="hosting" value="1" @if(Input::old('hosting') === '1'){{ "checked" }} @endif > No, but i will organise it myself.</label></div>
				<div class="col-md-4"><label><input type="radio" name="hosting" value="2" @if(Input::old('hosting') === '2'){{ "checked" }} @endif > Yes, I already have hosting.</label></div>
			</div>
		</div>
		<div class="row">
			<label class="control-label" for="hosting_details">If you have your own hosting, or plan to get your own hosting, please describe your hosting setup.</label>
			{!! $errors->first('hosting_details', '<span class="text-danger">:message</span>') !!}
			<div class="col-md-6">
				<textarea rows="4" name="hosting_details" placeholder="Your hosting plan or details. If you are unsure just let us know which company your hosting is with and which plan you are on." class="form-control">{{{ Input::old('hosting_details')}}}</textarea>
			</div>
		</div>
		<h4 class="brief_subheader orange big opensans">Website details</h4>
		<div class="row">
			<label class="control-label" for="sitetype">What type of website would you like developed?</label>
			{!! $errors->first('sitetype', '<span class="text-danger">:message</span>') !!}
			<ul class="col-md-12 radiorow_inner">
				<li><label><input type="radio" name="sitetype" value="company" @if(Input::old('sitetype') === 'company'){{ "checked" }} @endif > Company site (a few pages and features such as home page, services/products, about us, contact form, company information, etc)</label></li>
				<li><label><input type="radio" name="sitetype" value="blog" @if(Input::old('sitetype') === 'blog'){{ "checked" }} @endif > Blog (main purpose of the site is for regular postings of any sort, such as a personal or company blog, articles, news, etc)</label></li>
				<li><label><input type="radio" name="sitetype" value="portfolio" @if(Input::old('sitetype') === 'portfolio'){{ "checked" }} @endif > Portfolio</label></li>
				<li><label><input type="radio" name="sitetype" value="shop" @if(Input::old('sitetype') === 'shop'){{ "checked" }} @endif > E-Commerce site</label></li>
				<li><label><input type="radio" name="sitetype" value="webapp" @if(Input::old('sitetype') === 'webapp'){{ "checked" }} @endif > Web app (site performs a specific function)</label></li>
				<li><label><input type="radio" name="sitetype" value="other" @if(Input::old('sitetype') === 'other'){{ "checked" }} @endif > Other. (If your site will be some combination of the options above, please describe it here)</label></li>
			</ul>
			<div class="col-md-8">
				<textarea name="sitetype_details" class="form-control" rows="4" placeholder="If you answered Other above, please outline your site here">{{{ Input::old('sitetype_details') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<label class="control-label" for="content_management">Once your site is completed, how would you like to manage the sites content?</label>
			{!! $errors->first('content_management', '<span class="text-danger">:message</span>') !!}
			<ul class="col-md-12 radiorow_inner">
				<li><label><input type="radio" name="content_management" value="none" @if(Input::old('content_management') === 'none'){{ "checked" }} @endif > The content will mostly remain unchanged, aside from small revisions</label></li>
				<li><label><input type="radio" name="content_management" value="minor" @if(Input::old('content_management') === 'minor'){{ "checked" }} @endif > Most of the content would remain unchanged, but I would like to be able to change certain elements myself (i.e certain images or sections of text)</label></li>
				<li><label><input type="radio" name="content_management" value="nonblog cms" @if(Input::old('content_management') === 'nonblog cms'){{ "checked" }} @endif > I wont be blogging, but I need to add other forms of content myself (such as events, image galleries, products, portfolio projects)</label></li>
				<li><label><input type="radio" name="content_management" value="blog" @if(Input::old('content_management') === 'blog'){{ "checked" }} @endif > It’s a blog</label></li>
				<li><label><input type="radio" name="content_management" value="other" @if(Input::old('content_management') === 'other'){{ "checked" }} @endif > Other, described below</label></li>
			</ul>
			<div class="col-md-8">
				{!! $errors->first('cm_details', '<span class="text-danger">:message</span>') !!}
				<textarea name="cm_details" class="form-control" rows="4" placeholder="If you answered Other above, please outline how you would like to manage your content here">{{{ Input::old('cm_details') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="socialmedia">What social media interaction would you like on your site?</label>
				{!! $errors->first('socialmedia', '<span class="text-danger">:message</span>') !!}
				<textarea class="form-control" name="socialmedia" rows="6" placeholder="Please describe if or how your site will interact with the various social media platforms.">{{{ Input::old('socialmedia') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="site_requirements">What are the definite requirements for your site?</label>
				{!! $errors->first('site_requirements', '<span class="text-danger">:message</span>') !!}
				<textarea class="form-control" name="site_requirements" rows="6" placeholder="I.e. 'It must ...' or 'It must NOT ...'">{{{ Input::old('site_requirements') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="site_direction">Is there a certain direction you want to see your website go?</label>
				{!! $errors->first('site_direction', '<span class="text-danger">:message</span>') !!}
				<textarea class="form-control" name="site_direction" rows="6" placeholder="Such as specific ideas or features you would like present in the site'">{{{ Input::old('site_direction') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="site_target">What is the target market of your site and would you be able to describe your average user?</label>
				{!! $errors->first('site_target', '<span class="text-danger">:message</span>') !!}
				<textarea class="form-control" name="site_target" rows="6" placeholder="Who do you expect to be the main users of your site?">{{{ Input::old('site_target') }}}</textarea>
			</div>
		</div>
	</div>
	<div id="print_brief">
		<h2 class="brief_header blue geosans">so you want some print media...</h2>
		<h4 class="brief_subheader orange big opensans">please answer these questions as best you can</h4>
		<div class="row">
			<div class="col-md-9">
				<label for="printdesc" class="control-label">What are you after?</label>
				{!! $errors->first('printdesc', '<span class="text-danger">:message</span>') !!}
				<textarea rows="5" name="printdesc" class="form-control" placeholder="A business card, a brochure, a menu, a poster, a sticker, a t&dash;shirt, a book or album cover, a magazine spread, a print or online ad, marketing material, etc?">{{{ Input::old('printdesc') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<label for="printuse" class="control-label">Where and how will it be used?</label>
				{!! $errors->first('printuse', '<span class="text-danger">:message</span>') !!}
				<textarea rows="3" name="printuse" class="form-control" placeholder="What is the purpose of it? What do you hope it will achieve? Where will it be used?">{{{ Input::old('printuse') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<label for="printspecifics" class="control-label">What are the specifics?</label>
				{!! $errors->first('printspecifics', '<span class="text-danger">:message</span>') !!}
				<textarea rows="4" name="printspecifics" class="form-control" placeholder="Describe the size and shape you want. What dimensions must it be? Are there any folds or unusual shapes that need to be considered?">{{{ Input::old('printspecifics') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<label for="printdirection" class="control-label">Is there a certain direction you want to see it go in? Any specific ideas or imagery?</label>
				{!! $errors->first('printdirection', '<span class="text-danger">:message</span>') !!}
				<textarea rows="4" name="printdirection" class="form-control" placeholder="This is where you describe what you have in mind. It may be useful to attach any rough sketches or diagrams to help us out visually interpret what you want. If you have specific ideas this where you get to put them across to us.">{{{ Input::old('printdirection') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9 file-select-area">
				@if(Session::has('uploadErrors'))
        			@foreach(Session::get('uploadErrors') as $uploadError)
        				<p class="text-danger">{{ $uploadError }}</p>
        			@endforeach
        		@endif
				<label for="printimg_select" class="control-label"><span class="glyphicon glyphicon-picture"></span> Attach any images here <span class="browse_btn opensans">Browse files</span>
					<input type="file" name="printimages[]" id="printimg_select" class="form-control" multiple>
				</label>
			</div>
		</div>
		<div id="printimg_prog"></div>
		<div class="row">
			<div class="col-md-9">
				<label for="printtext" class="control-label">What written content will it include?</label>
				{!! $errors->first('printtext', '<span class="text-danger">:message</span>') !!}
				<textarea rows="4" name="printtext" class="form-control" placeholder="Whether it's a business card or a full magazine layout, we need the text. It is better to attach a word (or the likes) document with this information, especially for something as in depth as a brochure.">{{{ Input::old('printtext') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9 file-select-area">
				@if(Session::has('uploadErrors'))
        			@foreach(Session::get('uploadErrors') as $uploadError)
        				<p class="text-danger">{{ $uploadError }}</p>
        			@endforeach
        		@endif
				<label for="printdoc_select" class="control-label"><span class="glyphicon glyphicon-list-alt"></span> Attach any word/text/pdf documents here <span class="browse_btn opensans">Browse files</span>
					<input type="file" name="printdocs[]" id="printdoc_select" class="form-control" multiple>
				</label>
			</div>
		</div>
		<div id="print_doc_prog"></div>
		<div class="row">
			<div class="col-md-9">
				<label for="printrestrictions" class="control-label">Are there any restrictions or unique requests?</label>
				{!! $errors->first('printrestrictions', '<span class="text-danger">:message</span>') !!}
				<textarea rows="4" name="printrestrictions" class="form-control" placeholder="Is there something that must be included or must be avoided? Is there anything else we need to know before going ahead?">{{{ Input::old('printrestrictions') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<label for="printcolour" class="control-label">Is there a particular color scheme they want to use?</label>
				{!! $errors->first('printcolour', '<span class="text-danger">:message</span>') !!}
				<textarea rows="4" name="printcolour" class="form-control" placeholder="Any colors in general that appeal to you? Or maybe you have something very specific, in which case you 'll need to let us know the exact color values.">{{{ Input::old('printcolour') }}}</textarea>
			</div>
		</div>
		<div class="row">
			<label for="printprint" class="control-label">Will you be requiring printing?</label>
			<div class="row">
				<div class="col-md-offset-1 col-md-4"><label><input type="radio" name="printprint" value="0"> No</label></div>
				<div class="col-md-4"><label><input type="radio" name="printprint" value="1"> Yes (printing fees will be added to your final invoice)</label></div>
			</div>
			<p class="brief_note darkgrey">Note: We can get it printed for you by our trusted printing company. However, you also have the option to do this yourself.</p>
		</div>
		<div class="row">
			<div class="col-md-9">
				<label for="printrequirements" class="control-label">What are your final requirements?</label>
				{!! $errors->first('printrequirements', '<span class="text-danger">:message</span>') !!}
				<textarea rows="4" name="printrequirements" class="form-control" placeholder="What do you want us to deliver to you? What file formats are you after? If you're gettting prints, how many do you require?">{{{ Input::old('printrequirements') }}}</textarea>
			</div>
		</div>
	</div>
	<div id="brief_submit_container" class="row">
		<div class="col-md-offset-3 col-md-6">
			<button type="submit" class="btn btn-danger form-control" id="submitbutton">Submit brief</button>
		</div>
	</div>
	{!! Form::close() !!}
	<div class="body-section wavy geosans">
				<p class="big">By filling in the questionnaire you are not committing to anything, merely giving us an idea of what you want. Once you have submitted your questionnaire we will asses it and get back to you with a quote and an agreement plan.</p>
	</div>
	@include('footer')
	@stop

@section('bodyscripts')
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/uploadi.min.js') }}"></script>
	<script src="{{ asset('js/getstarted.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
				$(".mytooltip").tooltip();
				briefSelector.select();
				myFormManager.init();
				serviceSelector.init();
			});
	</script>
@stop