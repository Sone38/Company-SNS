<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'body',
        'user_id',
        'title',
    ];

    /**
     * departments_tableとのリレーション（従テーブル側）
     */

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function formDelete($id) {
        Contact::find($id)->delete();

        return redirect(route('top-admin-form'));
    }
}
