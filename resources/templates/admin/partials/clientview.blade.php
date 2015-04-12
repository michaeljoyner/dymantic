<div class="client-box">
    <div class="client-image-box">
        <img src="{{ asset($client->present()->clientImage()) }}" alt=""/>
    </div>
    <a href="/admin/clients/show/{{ $client->slug }}"><h3 class="client-name">{{ $client->name }}</h3></a>
    <p>Projects: {{ $client->projects->count() }}</p>
</div>