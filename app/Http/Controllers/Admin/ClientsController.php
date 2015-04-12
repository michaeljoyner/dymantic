<?php namespace Dymantic\Http\Controllers\Admin;

use Dymantic\Clients\ClientRepository;
use Dymantic\Http\Requests;
use Dymantic\Http\Controllers\Controller;
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
}
