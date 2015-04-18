<?php namespace Dymantic\Http\Controllers\Admin;

use Dymantic\Http\Requests;
use Dymantic\Http\Controllers\Controller;
use Dymantic\Projects\ProjectRepository;
use Dymantic\Projects\TasksRepository;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->middleware('auth');
        $this->projectRepository = $projectRepository;
    }

    public function show($id)
    {
        $project = $this->projectRepository->findById($id);
        return view('admin.projects.show')->with(compact('project'));
    }

    public function showTask($id, TasksRepository $tasksRepository)
    {
        $task = $tasksRepository->findById($id);
        return view('admin.projects.showtask')->with(compact('task'));
    }

    public function createTask($id)
    {
        $project = $this->projectRepository->findById($id);
        return view('admin.projects.createtask')->with(compact('project'));
    }

    public function storeTask(Request $request, TasksRepository $tasksRepository)
    {
        $tasksRepository->store($request->all());

        return redirect('admin/clients');
    }

    public function update($id, Request $request)
    {
        $this->projectRepository->update($id, $request->all());
        return redirect('admin/clients');
    }

    public function delete($id)
    {
        $this->projectRepository->deleteById($id);
        return redirect('admin/clients');
    }
}
