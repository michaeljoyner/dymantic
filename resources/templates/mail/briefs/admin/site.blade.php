@include('mail.briefs.admin.general')
<h2 style="text-align:center;color:#6FCCE2;">Website Brief</h2>

<p style="color:#F2842E;">Do you have your own domain?</p>
@if($siteBrief['hasdomain'] === 0)
    <p>No, I would like you to to that for me</p>
@elseif($siteBrief['hasdomain'] === 1)
    <p>No, but I will get it myself</p>
@elseif($siteBrief['hasdomain'] === 2)
    <p>Yes, I already have one</p>
@endif

@if($siteBrief['domain_name'] != '')
    <p>Our domain: <a href="{{ $siteBrief['domain_name'] }}">{{ $siteBrief['domain_name'] }}</a></p>
@endif

<p style="color:#F2842E;">Do you have your own hosting?</p>
@if($siteBrief['hosting'] === 0)
    <p>No, we would like you to organise that for me</p>
@elseif($siteBrief['hosting'] === 1)
    <p>No, but we will organise it myself</p>
@elseif($siteBrief['hosting'] === 2)
    <p>Yes, we already have hosting</p>
@endif

@if($siteBrief['hosting_details'])
    <p>{{ $siteBrief['hosting_details'] }}</p>
@endif

<p style="color:#F2842E;">What type of website would you like developed?</p>
@if($siteBrief['sitetype'] === 'company')
    <p>Company site (a few pages and features such as home page, services/products, about us, contact form, company information, etc)</p>
@elseif($siteBrief['sitetype'] === 'blog')
    <p>Blog (main purpose of the site is for regular postings of any sort, such as a personal or company blog, articles, news, etc)</p>
@elseif($siteBrief['sitetype'] === 'portfolio')
    <p>Portfolio</p>
@elseif($siteBrief['sitetype'] === 'shop')
    <p>E-Commerce site</p>
@elseif($siteBrief['sitetype'] === 'webapp')
    <p>Web app (site performs a specific function)</p>
@elseif($siteBrief['sitetype'] === 'other')
    <p>Other</p>
@endif

@if($siteBrief['sitetype_details'] != '')
    <p>Some details: {{ $siteBrief['sitetype_details'] }}</p>
@endif

<p style="color:#F2842E;">Once your site is completed, how would you like to manage the sites content?</p>
@if($siteBrief['content_management'] === 'none')
    <p>The content will mostly remain unchanged, aside from small revisions</p>
@elseif($siteBrief['content_management'] === 'minor')
    <p>Most of the content would remain unchanged, but I would like to be able to change certain elements myself (i.e certain images or sections of text)</p>
@elseif($siteBrief['content_management'] === 'nonblog cms')
    <p>I wont be blogging, but I need to add other forms of content myself (such as events, image galleries, products, portfolio projects)</p>
@elseif($siteBrief['content_management'] === 'blog')
    <p>It’s a blog</p>
@elseif($siteBrief['content_management'] === 'other')
    <p>Other</p>
@endif

@if($siteBrief['cm_details'] != '')
    <p>More on content management: {{ $siteBrief['cm_details'] }}</p>
@endif

<p style="color:#F2842E;">What social media interaction would you like on your site?</p>
<p>{{ $siteBrief['socialmedia'] }}</p>

<p style="color:#F2842E;">What are the definite requirements for your site?</p>
<p>{{ $siteBrief['site_requirements'] }}</p>

<p style="color:#F2842E;">Is there a certain direction you want to see your website go?</p>
<p>{{ $siteBrief['site_direction'] }}</p>

<p style="color:#F2842E;">What is the target market of your site and would you be able to describe your average user?</p>
<p>{{ $siteBrief['sitetarget'] }}</p>