<?php namespace Dymantic\Projects;

use Dymantic\Presenters\Contracts\PresenterInterface;
use Dymantic\Presenters\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class TaskFile extends Model implements PresenterInterface
{
    use PresentableTrait;

    protected $presenter = 'Dymantic\Presenters\TaskFilePresenter';

    protected $table = 'taskfiles';

    protected $fillable = [
        'task_id',
        'filepath'
    ];

    public function task()
    {
        return $this->belongsTo('Dymantic\Projects\Task', 'task_id');
    }
}
