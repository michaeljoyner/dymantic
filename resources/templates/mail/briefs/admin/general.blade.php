<h2 style="text-align:center;"><span style="color:#F2842E;">{{ $generalBrief['contact_person'] }} </span>
        @if($generalBrief['company'] != '')
            from<span style="color:#F2842E;"> {{ $generalBrief['company'] }}</span>
        @endif
         has submitted a brief.</h2>

        <h3 style="text-align:center;color:#6FCCE2;">Here is a bit about us</h3>

        @if($generalBrief['since'] != '' && $generalBrief['industry'] != '')
            <p>We have been operating in the <span style="color:#F2842E;">{{ $generalBrief['industry'] }}</span> industry since <span style="color:#F2842E;">{{ $generalBrief['since'] }}</span></p>
        @endif

        @if($generalBrief['since'] != '' && $generalBrief['industry'] == '')
            <p>We have been operating since <span style="color:#F2842E;">{{ $generalBrief['since'] }}</span></p>
        @endif

        @if($generalBrief['since'] == '' && $generalBrief['industry'] != '')
            <p>We operate in the <span style="color:#F2842E;">{{ $generalBrief['industry'] }}</span> industry</p>
        @endif

        @if($generalBrief['background'] != '')
            <p><span style="color:#F2842E;">A little about our background:</span> {{ $generalBrief['background'] }}</p>
        @endif

        @if($generalBrief['reaction'] != '')
            <p><span style="color:#F2842E;">Who we are targeting and what reaction we hope to achieve:</span> {{ $generalBrief['reaction'] }}</p>
        @endif

        @if($generalBrief['nutshell'] != '')
            <p><span style="color:#F2842E;">This is us in a nutshell:</span> {{ $generalBrief['nutshell'] }}</p>
        @endif

        @if($generalBrief['current_website'] != '')
            <p>Our current website is <a href="{{ $generalBrief['current_website'] }}">{{ $generalBrief['current_website'] }}</a></p>
        @endif
