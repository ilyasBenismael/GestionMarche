<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('goProfil');
    }
    public function goProfil()
    {

        // Get the authenticated user
        $user = Auth::user();

        // Get the chats where user1 or user2 is the authenticated user
        $chats = Chat::where('user1', $user->id)
            ->orWhere('user2', $user->id)->orderBy('updated_at', 'desc')
            ->get();

        // Create an empty array to store chat information with user details
        $chatList = [];

        // Iterate over each chat
        foreach ($chats as $chat) {
            // Get the other user's ID
            $otherUserId = ($chat->user1 == $user->id) ? $chat->user2 : $chat->user1;

            // Get the user information from the database
            $otherUser = User::find($otherUserId);

            $unreadMessages = Message::where('chat', $chat->id)
                ->where('seen', 'false')
                ->where('receiver', auth()->id())
                ->count();

            $latestUnseenMessageObjct = Message::where('chat', $chat->id)
                ->latest('created_at')
                ->first();


            $latestUnseenMessage=null;
            if ($latestUnseenMessageObjct) {
                $latestUnseenMessage = $latestUnseenMessageObjct->msg;
            }
            // Create an array with chat and user information
            $chatInfo = [
                'userImage' => $otherUser->image,
                'name' => $otherUser->name,
                'msgs_nbr' => $unreadMessages,
                'link' => 'chat/' . $otherUserId,
                'last_msg' => $latestUnseenMessage,
            ];

            // Add the chat info to the chat list
            if ($otherUserId != $user->id) {
                $chatList[] = $chatInfo;
            }
        }
        $notifications = Notification::where('target', auth()->id())->get();
        $nbr_notif = $notifications->count();
        return response()->view('profil/show', compact('user', 'chatList', 'notifications', 'nbr_notif'))->header('Cache-Control', 'no-cache, no-store, must-revalidate');

    }

}
