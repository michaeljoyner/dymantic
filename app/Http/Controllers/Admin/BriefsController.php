<?php namespace Dymantic\Http\Controllers\Admin;

use Dymantic\Briefs\General\GeneralBriefRepo;
use Dymantic\Http\Requests;
use Dymantic\Http\Controllers\Controller;
use Dymantic\Services\BriefToClientConverter;
use Illuminate\Http\Request;

class BriefsController extends Controller
{
    /**
     * @var GeneralBriefRepo
     */
    private $generalBriefRepo;

    public function __construct(GeneralBriefRepo $generalBriefRepo)
    {

        $this->generalBriefRepo = $generalBriefRepo;
    }


    public function index()
    {
        $generalBriefs = $this->generalBriefRepo->all();

        return view('admin.briefs.index')->with(compact('generalBriefs'));
    }

    public function show($id)
    {
        $generalBrief = $this->generalBriefRepo->findById($id);

        return view('admin.briefs.show')->with(compact('generalBrief'));
    }

    public function convertNew($id, BriefToClientConverter $converter)
    {
        $generalBrief = $this->generalBriefRepo->findById($id);
        $converter->convertToNewClient($generalBrief);

        return redirect('admin/clients');
    }
}
