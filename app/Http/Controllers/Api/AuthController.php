<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Priority;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    public $successStatus = 200;

    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['is_admin'] = false;
        
        $user = User::create($input);
        $success['api_token'] =  $user->createToken('PWM API')->accessToken;

        $user = User::find($user->id);
        $user->api_token = $user->createToken('PWM API')->accessToken;
        $user->save();

        $priority = new Priority();
        $priority->user_id = $user->id;
        $priority->priority = false;
        $priority->save();
        
        return response()->json(['success' => $success], $this->successStatus);
    }


    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['api_token'] =  $user->createToken('PWM API')->accessToken;

            $user = User::find($user->id);
            $user->api_token = $user->createToken('PWM API')->accessToken;
            $user->save();

            return response()->json([
                'data' => $user
            ], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function getUser()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
