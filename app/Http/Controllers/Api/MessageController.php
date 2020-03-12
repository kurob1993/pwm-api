<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Message;

class MessageController extends Controller
{
    public $successStatus = 200;

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'number' => 'required|numeric',
                'text' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = Auth::user();
        $success =  $request->input();
        $success['user_id'] =  $user->id;
        $success['stage_id'] =  1;

        Message::create($success);

        return response()->json(['success' => $success], $this->successStatus);
    }

    public function show()
    {
        $user = Auth::user();
        $message = Message::where('user_id', $user->id)
            ->where('stage_id', 1)
            ->first();

        return response()->json(['success' => $message], $this->successStatus);
    }

    public function sending()
    {
        $user = Auth::user();
        $priority = Auth::user()->priority;

        if ($priority->priority) {
            $message = Message::where('user_id', $user->id)
                ->where('stage_id', 1)
                ->first();
        }else{
            $message = Message::select( 'messages.*')
                ->join('priorities', 'priorities.user_id', '=', 'messages.user_id')
                ->where('messages.stage_id',1)
                ->orderBy('priorities.priority','DESC')
                ->first();
        }
        
        if ($message) {
            $msg = Message::find($message->id);
            $msg->stage_id = 2;
            $msg->save();
        }

        return response()->json(['success' => $message], $this->successStatus);
    }

    public function sended(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $message = Message::find($request->input('id'));

        if ($message) {
            $message->stage_id = 3;
            $message->save();
        }

        return response()->json(['success' => $message], $this->successStatus);
    }
}
