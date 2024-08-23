<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class userController extends Controller
{
    public function index()
    {
        $users = DB::table('view_users')->get();
        return view('users.index', compact('users'));
    }   

    public function makeInfrastruktur(Request $request, $userId)
    {
        $user = User::findOrFail($userId); 
        $user->syncRoles('Bidang Infrastruktur dan Kewilayahan');
        return redirect()->back()->with('success', 'User role updated successfully.');
    }

    public function makeEkonomi(Request $request, $userId)
    {
        $user = User::findOrFail($userId); 
        $user->syncRoles('Bidang Ekonomi');
        return redirect()->back()->with('success', 'User role updated successfully.');
    }

    public function makeGeospasial(Request $request, $userId)
    {
        $user = User::findOrFail($userId); 
        $user->syncRoles('Bidang Geospasial');
        return redirect()->back()->with('success', 'User role updated successfully.');
    }

}
