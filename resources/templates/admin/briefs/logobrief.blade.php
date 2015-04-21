<div class="client-brief-box pull-left">
    <p class="question">Do you have an existing logo?</p>
    <p class="answer">{{ $logoBrief->present()->hasExistingLogo() }}</p>
    <p class="question">Do you have a colour scheme you want the logo to follow?</p>
    <p class="answer">{{ $logoBrief->logocolours }}</p>
    <p class="question">Is the a certain direction you want your logo to go in?</p>
    <p class="answer">{{ $logoBrief->logodirection }}</p>
    <p class="question">Are there any restrictions?</p>
    <p class="answer">{{ $logoBrief->logorestrictions }}</p>
    <p class="question">What are your final requirements?</p>
    <p class="answer">{{ $logoBrief->logorequirements }}</p>
</div>
<div class="brief-images-box pull-right">
    @foreach($logoBrief->logoFiles as $image)
        <div class="logo-image-box">
            <img src="{{ asset($image->imagepath) }}" alt="" width="150" height="150"/>
        </div>
    @endforeach
</div>