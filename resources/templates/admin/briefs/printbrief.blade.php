<div class="client-brief-box pull-left">
    <p class="question">What are you after?</p>
    <p class="answer">{{ $printBrief->printdesc }}</p>
    <p class="question">Where and how will it be used?</p>
    <p class="answer">{{ $printBrief->printuse }}</p>
    <p class="question">What are the specifics?</p>
    <p class="answer">{{ $printBrief->printspecifics }}</p>
    <p class="question">Is there a certain direction you want to see it go in? Any specific ideas or imagery?</p>
    <p class="answer">{{ $printBrief->printdirection }}</p>
    <p class="question">What written content will it include?</p>
    <p class="answer">{{ $printBrief->printtext }}</p>
    <p class="question">Are there any restrictions or unique requests?</p>
    <p class="answer">{{ $printBrief->printrestrictions }}</p>
    <p class="question">Is there a particular colour scheme you want to use?</p>
    <p class="answer">{{ $printBrief->printcolour }}</p>
    <p class="question">Will you be requiring printing?</p>
    <p class="answer">{{ $printBrief->printprint == 0 ? 'No' : 'Yes' }}</p>
    <p class="question">What are your final requirements?</p>
    <p class="answer">{{ $printBrief->printrequirements }}</p>
</div>
<div class="brief-images-box pull-right">
    @foreach($printBrief->printImages as $image)
        <div class="logo-image-box">
            <img src="{{ asset($image->imagepath) }}" alt="" width="150" height="150"/>
        </div>
    @endforeach
    @foreach($printBrief->printDocs as $doc)
        <div class="logo-image-box">
            <a href="{{ asset($doc->documentpath) }}" target="_blank" download>
                <img src="{{ asset('images/document-icon.png') }}" alt="" width="150" height="150"/>
            </a>
            <p>{{ substr($doc->documentpath, strrpos($doc->documentpath, '/')+1) }}</p>
        </div>
    @endforeach
</div>