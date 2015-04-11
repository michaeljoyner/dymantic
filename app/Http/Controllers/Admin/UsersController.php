<?php namespace Dymantic\Http\Controllers\Admin;

use Dymantic\Http\Requests;
use Dymantic\Http\Controllers\Controller;
use Dymantic\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function register(Request $request)
    {
        User::create($request->only('name', 'email', 'password'));
        return redirect('admin');
    }
}
