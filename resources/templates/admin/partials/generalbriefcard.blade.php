<div class="brief-box">
    <header class="clearfix">
        <h1 class="company-name pull-left"><a href="/admin/briefs/{{ $generalBrief->id }}">{{ $generalBrief->company }}</a></h1>
        <p class="pull-right"><strong>{{ $generalBrief->created_at->diffForHumans() }}</strong></p>
    </header>
    <hr/>
    <ul class="task-vitals">
        <li>
            <span class="fa fa-user"></span><span> {{ $generalBrief->contact_person }}</span>
        </li>
        <li>
            <span class="fa fa-envelope"></span><span> {{ $generalBrief->email }}</span>
        </li>
    </ul>
    <p>{{ $generalBrief->background }}</p>
    @if($generalBrief->logoBriefs->count())
        <span class="sub-brief-type">Logo Brief</span>
    @endif
    @if($generalBrief->siteBriefs->count())
        <span class="sub-brief-type">Website Brief</span>
    @endif
    @if($generalBrief->printBriefs->count())
        <span class="sub-brief-type">Print Brief</span>
    @endif
</div>