<?php namespace Dymantic\Projects;

use Dymantic\Presenters\Contracts\PresenterInterface;
use Dymantic\Presenters\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class Task extends Model implements PresenterInterface
{
    use PresentableTrait;

    protected $presenter = 'Dymantic\Presenters\TaskPresenter';
    protected $table = 'tasks';

    protected $fillable = [
        'project_id',
        'name',
        'brief',
        'notes',
        'deadline',
        'status',
        'task_complete'
    ];

    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = $status;
        if($status === 'Complete' || $status === 'complete')
        {
            $this->attributes['task_complete'] = true;
        }
        else
        {
            $this->attributes['task_complete'] = false;
        }
    }

    public function project()
    {
        return $this->belongsTo('Dymantic\Projects\Project');
    }

    public function taskFiles()
    {
        return $this->hasMany('Dymantic\Projects\Taskfile', 'task_id');
    }
}
