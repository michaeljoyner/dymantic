@include('mail.briefs.admin.general')
<h2 style="text-align:center;color:#6FCCE2;">Logo Brief</h2>
<p style="color:#F2842E;">Do you have an existing logo?</p>
@if($logoBrief['haslogo'] === 0)
    <p>No, we don't</p>
@elseif($logoBrief['haslogo'] === 1)
    <p>Yes, we do.</p>
@endif

@if(isset($files) && count($files) > 0)
    <p>{{ count($files) }} images have been sent. See attachments.</p>
@endif

<p style="color:#F2842E;">Does your company have a colour scheme you want the logo to follow?</p>
<p>{{ $logoBrief['logocolours'] }}</p>

<p style="color:#F2842E;">Is there a certain direction you want your logo to go in?</p>
<p>{{ $logoBrief['logodirection'] }}</p>

<p style="color:#F2842E;">Are there any restrictions?</p>
<p>{{ $logoBrief['logorestrictions'] }}</p>

<p style="color:#F2842E;">What are your final requirements?</p>
<p>{{ $logoBrief['logorequirements'] }}</p>
