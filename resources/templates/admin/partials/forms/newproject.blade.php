{!! Form::model($project, ['url' => $url, 'class' => 'form-horizontal dymantic-form']) !!}
<input type="hidden" name="client_id" value="{{ $client->id }}"/>
<div class="form-group">
    {!! Form::label('name', 'Project Name:', ['class' => 'col-md-3']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'A Brief description of the project and it\'s target market', ['class' => 'col-md-3']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-3 col-md-6">
        <button class="btn btn-success form-control submit-button">{{ $submitText }}</button>
    </div>
</div>
{!! Form::close() !!}