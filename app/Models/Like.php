<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    use HasFactory;

    /**
     * users_tableとのリレーション（従テーブル側）
     */

    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * posts_tableとのリレーション（従テーブル側）
     */

    public function post() {
        return $this->belongsTo(Post::class);
    }

    // いいねがされているかどうか判別
    public function alreadyLiked($id, $post_id) {
        $alreadyLiked = Like::where('user_id', Auth::user()->id)->where('post_id', '=', $post_id)->get();

        // $alreadyLikedがある場合
        if(!$alreadyLiked->isEmpty()) {
            return true;
        // $alreadyLikedがない場合
        }else {
            return false;
        }
    }
}
