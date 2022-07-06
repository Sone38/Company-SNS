<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * users_tableとのリレーション（従テーブル側）
     */

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    // 投稿の削除処理
    public function postDelete($id) {
        Post::find($id)->delete();

        return redirect(route('top-admin-main'));
    }

    // いいね機能関連

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
