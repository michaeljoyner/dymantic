<?php namespace Dymantic\Http\Controllers\Admin;

use Dymantic\Http\Requests;
use Dymantic\Http\Controllers\Controller;
use Dymantic\Projects\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function setStatus($id, Request $request)
    {
        $task = Task::findOrFail($id);
        $task->status = $request->get('status');
        $task->save();
        return 'okay';
    }
    //
}
