<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'chat_room_id',
        'message',
    ];

    /**
     * users_tableとのリレーション（従テーブル側）
     */

    public function department() {
        return $this->belongsToMany(Department::class);
    }
}
