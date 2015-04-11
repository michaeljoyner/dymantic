<?php namespace Dymantic\Http\Controllers\Admin;

use Dymantic\Http\Requests;
use Dymantic\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('admin.pages.home');
    }
}
