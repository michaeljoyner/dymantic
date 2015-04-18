<div class="row">
<div class="col-md-9">
{!! Form::model($client, ['url' => $url, 'class' => 'form-horizontal dymantic-form', 'id' => 'client-form']) !!}
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'col-md-3']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('contact_person', 'Contact Person:', ['class' => 'col-md-3']) !!}
    <div class="col-md-6">
        {!! Form::text('contact_person', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('contact_email', 'Email address:', ['class' => 'col-md-3']) !!}
    <div class="col-md-6">
        {!! Form::email('contact_email', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('website', 'Website', ['class' => 'col-md-3']) !!}
    <div class="col-md-6">
        {!! Form::text('website', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('industry', 'Industry:', ['class' => 'col-md-3']) !!}
    <div class="col-md-6">
        {!! Form::text('industry', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('operating_since', 'Operating since:', ['class' => 'col-md-3']) !!}
    <div class="col-md-3">
        {!! Form::text('operating_since', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'col-md-3']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control tall-textbox']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-3 col-md-6">
        <button type="submit" class="btn btn-success form-control submit-button">Add</button>
    </div>
</div>
{!! Form::close() !!}
</div>
<div class="col-md-3">
    <form action="/admin/clients/imageupload" class="dropzone" id="client-pic-dropzone">

    </form>
</div>
</div>
