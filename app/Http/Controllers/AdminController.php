<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'admin-activated']);
    // }

    public function index()
    {
        return view('admin.menu');
    }
    public function projectsMenu()
    {
        return view('admin.projects.menu');
    }
    public function manageAdmins(){
        $admins = User::all();
        return view('admin.manage',compact('admins'));
    }
    public function update($id)
    {
        $user = User::findOrFail($id);
        if($user->isActivated == 0){
            $user->isActivated = 1;
        }else{
            $user->isActivated = 0;
        }
        $user->save();
        return redirect('admin/manage')->with('status', 'Admin Updated Successfully');
    }
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin/manage')->with('status', 'Admin Deleted Successfully');
    }
}
