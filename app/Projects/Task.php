<?php namespace Dymantic\Projects;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
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

    public function project()
    {
        return $this->belongsTo('Dymantic\Projects\Project');
    }
}
