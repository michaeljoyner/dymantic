<?php namespace Dymantic\Projects;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'description',
        'name',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo('Dymantic\Clients\Client');
    }

    public function tasks()
    {
        return $this->hasMany('Dymantic\Projects\Task');
    }

    public function getNumberOfCompleteTasks()
    {
        return $this->tasks()->where('task_complete', true)->get()->count();
    }
}
