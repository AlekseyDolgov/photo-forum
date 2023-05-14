<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Collective\Html\FormFacade as Form;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::all();
        return view('admin', compact('users'));
    }

    public function banned(Request $request)
    {
        $user = User::findOrFail($request->user);
        $user->banned_until = $request->banned_until;
        $user->save();
        return back();
    }
}
