<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function goChat($hisid)
    {
        $user= User::find($hisid);
        $chat = Chat::where([
            ['user1', '=', auth()->id()],
            ['user2', '=', $hisid],
        ])->orWhere([
            ['user1', '=', $hisid],
            ['user2', '=', auth()->id()],
        ])->first();

        if($chat==null){
                $chat = Chat::create([
                    'user1'=>auth()->id(),
                    'user2'=>$hisid,
                    'date' => now()
                ]); }

        $messages=Message::where('chat', $chat->id)->orderBy('created_at', 'asc')
            ->get();

        foreach ($messages as $message) {
            // Check if the message is not seen
            if ($message->seen == 'false' && $message->sender != auth()->id()) {
                // Update the seen attribute to true
                $message->seen = 'true';
                $message->save();
            }
            }

        return view('chat', ['messages'=>$messages, 'chatid'=>$chat->id, 'user'=>$user]);
    }

    public function sendMessage(Request $request, $chatid, $hisid)
    {
         $message=Message::create([
            'sender' => auth()->id(),
            'receiver' => $hisid,
            'msg' => $request['context'],
            'chat' => $chatid,
             'seen' => 'false'
        ]);

        $chat = Chat::find($chatid);

        if ($chat) {
            $chat->date = Carbon::now();
            $chat->save();
        }



        return response()->json(['success' => true, 'timestamp' => $message->created_at->format('Y-m-d H:i')]);
    }


}
