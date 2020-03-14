<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $message = Message::where('user_id',$user->id)->paginate(10);
        return view('message', ['message' => $message]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'number' => [
                    'required','numeric','digits_between:12,15',
                    function ($attribute, $value, $fail) {
                        if (!Str::of($value)->is('62*')) {
                            $fail($attribute.' is invalid. ext: 62**********');
                        }
                    }
                ],
                'text' => ['required']
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $success =  $request->input();
        $success['user_id'] =  $user->id;
        $success['stage_id'] =  1;

        Message::create($success);

        return redirect()->back()->with('status', 'data entered successfully');
    }

}
