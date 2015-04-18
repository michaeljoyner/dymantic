{!! Form::open(['url' => 'admin/projects/task', 'class' => 'form-horizontal dymantic-form']) !!}
<input type="hidden" name="project_id" value="{{ $project->id }}"/>
<div class="form-group">
    <label class="col-md-3" for="name">Task Name</label>
    <div class="col-md-6">
        <input class="form-control" type="text" name="name"/>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3" for="brief">Brief</label>
    <div class="col-md-6">
        <textarea name="brief" class="form-control tall-textbox"></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3" for="brief">Notes</label>
    <div class="col-md-6">
        <textarea name="notes" class="form-control tall-textbox"></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3" for="name">Deadline</label>
    <div class="col-md-6">
        <input class="form-control" type="text" name="deadline"/>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3" for="name">Status</label>
    <div class="col-md-6">
        <input class="form-control" type="text" name="status"/>
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-3 col-md-6">
        <button class="btn btn-success form-control submit-button">Create</button>
    </div>
</div>
{!! Form::close() !!}
