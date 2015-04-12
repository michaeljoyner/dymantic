{!! Form::open(['url' => 'admin/clients/project']) !!}
<input type="hidden" name="client_id" value="{{ $client->id }}"/>
<div class="form-group">
    <label class="col-md-3" for="description">A Brief description of the project and it\'s target market</label>
    <textarea class="col-md-6" name="description"></textarea>
</div>
<div class="form-group">
    <div class="col-md-offset-3 col-md-6">
        <button class="btn btn-success form-control">Start Project</button>
    </div>
</div>
{!! Form::close() !!}