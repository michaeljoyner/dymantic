<?php namespace Dymantic\Http\Controllers\Admin;

use Dymantic\AjaxFileUploads\FileStorer;
use Dymantic\Clients\Client;
use Dymantic\Clients\ClientImageFileStorer;
use Dymantic\Clients\ClientRepository;
use Dymantic\Http\Requests;
use Dymantic\Http\Controllers\Controller;
use Dymantic\Projects\Project;
use Dymantic\Projects\ProjectRepository;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->middleware('auth');
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        $clients = $this->clientRepository->all();
        return view('admin.clients.index')->with(compact('clients'));
    }

    public function create()
    {
        $client = new Client();
        return view('admin.clients.create')->with(compact('client'));
    }

    public function edit($slug)
    {
        return $this->returnViewWithClientFromSlug($slug, 'admin.clients.edit');
    }

    public function store(Request $request)
    {
        if($this->clientRepository->create($request->all())) {
            return redirect('admin/clients');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $slug)
    {
        $this->clientRepository->update($slug, $request->all());

        return redirect('admin/clients');
    }

    public function show($slug)
    {
        return $this->returnViewWithClientFromSlug($slug, 'admin.clients.show');
    }

    public function createProject($clientSlug)
    {
        $project = new Project();
        $client = $this->clientRepository->findBySlug($clientSlug);
        return view('admin.projects.create')->with(compact('project', 'client'));
    }

    public function editProject($clientSlug, $id, ProjectRepository $projectRepository)
    {
        $project = $projectRepository->findById($id);
        $client = $this->clientRepository->findBySlug($clientSlug);
        return view('admin.projects.edit')->with(compact('project', 'client'));
    }

    public function storeProject(Request $request)
    {
        $project = Project::create($request->all());

        return redirect('admin/clients');
    }

    public function storeImage(Request $request, ClientImageFileStorer $fileStorer)
    {
        $image = $request->file('file');
        $path = $fileStorer->store($image);

        return $path;
    }

    public function delete($id)
    {
        $this->clientRepository->deleteById($id);

        return redirect('admin/clients');
    }

    private function returnViewWithClientFromSlug($slug, $viewName)
    {
        $client = $this->clientRepository->findBySlug($slug);

        return view($viewName)->with(compact('client'));
    }




}
