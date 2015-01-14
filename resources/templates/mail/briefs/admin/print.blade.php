@include('mail.briefs.admin.general')
<h2 style="text-align:center;color:#6FCCE2;">Print Brief</h2>

<p style="color:#F2842E;">What are you after?</p>
<p>{{ $printBrief['printdesc'] }}</p>

<p style="color:#F2842E;">Where and how will it be used?</p>
<p>{{ $printBrief['printuse'] }}</p>

<p style="color:#F2842E;">What are the specifics?</p>
<p>{{ $printBrief['printspecifics'] }}</p>

<p style="color:#F2842E;">Is there a certain direction you want to see it go in? Any specific ideas or imagery?</p>
<p>{{ $printBrief['printdirection'] }}</p>

@if(isset($imageFiles) && count($imageFiles) > 0)
    <p>{{ count($imageFiles) }} image file(s) were uploaded. See attachments.</p>
@endif

<p style="color:#F2842E;">What written content will it include?</p>
<p>{{ $printBrief['printtext'] }}</p>

@if(isset($docFiles) && count($docFiles) > 0)
    <p>{{ count($docFiles) }} doc file(s) were uploaded. See attachments.</p>
@endif

<p style="color:#F2842E;">Are there any restrictions or unique requests?</p>
<p>{{ $printBrief['printrestrictions'] }}</p>

<p style="color:#F2842E;">Is there any particular colour scheme you want to use?</p>
<p>{{ $printBrief['printcolour'] }}</p>

<p style="color:#F2842E;">Will you require printing?</p>
@if($printBrief['printprint'] === 0)
    <p>No</p>
@elseif($printBrief['printprint'] === 1)
    <p>Yes</p>
@endif

<p style="color:#F2842E;">What are your final requirements?</p>
<p>{{ $printBrief['printrequirements'] }}</p>