<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\ChatRoomUser;
use Illuminate\Support\Facades\DB;

class ChatsController extends Controller
{
    // 全メッセージを取得
    public function getAllMessage() {
        // テーブルを結合してからデータを取得する
        $allMessageFromTable = DB::table('chat_messages')
                    ->leftJoin('users', 'chat_messages.user_id', '=', 'users.id')
                    ->select('users.name', 'chat_messages.message', 'chat_messages.created_at')
                    ->orderBy('created_at', 'asc')
                    ->get();
        //dd($allMessageFromTable['0']);
        
        return view('top-admin.top-admin-chat', compact('allMessageFromTable'));
    }

    // 全メッセージを取得
    public function getAllMessageForGeneral() {
        // テーブルを結合してからデータを取得する
        $allMessageFromTable = DB::table('chat_messages')
                    ->leftJoin('users', 'chat_messages.user_id', '=', 'users.id')
                    ->select('users.name', 'chat_messages.message', 'chat_messages.created_at')
                    ->orderBy('created_at', 'asc')
                    ->get();
        //dd($allMessageFromTable['0']);
        
        return view('general-chat', compact('allMessageFromTable'));
    }


    // メッセージを保存する
    public function messageSave(Request $request) {
        $user_id = Auth::user()->id;
        $chat_message = $request->chat_message;
        //dd($chat_message);

        ChatMessage::create([
            'user_id' => $user_id,
            'chat_room_id' => '1',
            'message' => $chat_message,
        ]);

        return redirect()->route('top-admin-chat');
    }

    // チャットメッセージの保存処理
    public function messageSaveForGeneral(Request $request) {
        $user_id = Auth::user()->id;
        $chat_message = $request->chat_message;
        //dd($chat_message);

        ChatMessage::create([
            'user_id' => $user_id,
            'chat_room_id' => '1',
            'message' => $chat_message,
        ]);

        return redirect()->route('general-chat');
    }
}
