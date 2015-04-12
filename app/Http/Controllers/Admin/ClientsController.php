<?php namespace Dymantic\Http\Controllers\Admin;

use Dymantic\Clients\ClientRepository;
use Dymantic\Http\Requests;
use Dymantic\Http\Controllers\Controller;
use Dymantic\Projects\Project;
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
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        if($this->clientRepository->create($request->all())) {
            return redirect('admin/clients');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function show($slug)
    {
        return $this->returnViewWithClientFromSlug($slug, 'admin.clients.show');
    }

    public function createProject($clientSlug)
    {
        return $this->returnViewWithClientFromSlug($clientSlug, 'admin.projects.create');
    }

    public function storeProject(Request $request)
    {
        $project = Project::create($request->all());

        return redirect('admin');
    }

    private function returnViewWithClientFromSlug($slug, $viewName)
    {
        $client = $this->clientRepository->findBySlug($slug);

        return view($viewName)->with(compact('client'));
    }
}
