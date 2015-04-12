<div class="container">
    {!! Form::open(['url' => 'admin/clients/create', 'class' => 'form-horizontal']) !!}
    <div class="form-group">
        <label class="col-md-3">Name</label>
        <div class="col-md-6">
            <input type="text" name="name" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3">Contact Person</label>
        <div class="col-md-6">
            <input type="text" name="contact_person" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3">Email</label>
        <div class="col-md-6">
            <input type="email" name="contact_email" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3">Website</label>
        <div class="col-md-6">
            <input type="text" name="website" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3">Industry</label>
        <div class="col-md-6">
            <input type="text" name="industry" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3">Operating since:</label>
        <div class="col-md-3">
            <input type="text" name="operating_since" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3">Name</label>
        <div class="col-md-6">
            <textarea name="description" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-3 col-md-6">
            <button type="submit" class="btn btn-success form-control">Add</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>