<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Priority;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Auth::User()->is_admin) {
            return redirect('home')->with('status', 'You do not have access');
        }

        $user = User::paginate(15);
        return view('user', compact('user'));
    }

    public function updatePriority(Request $request, $id)
    {
        if (!Auth::User()->is_admin) {
            return redirect('home')->with('status', 'You do not have access');
        }

        $priority = Priority::where('user_id',$id)->first();
        $priority->priority = $priority->priority ? false : true;
        $msg = '';
        if($priority->save()){
            $msg = 'data successfully changed';
        }else{
            $msg = 'data failed to change';
        }
        return redirect('users')->with('status', $msg);
    }
}
