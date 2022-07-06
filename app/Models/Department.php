<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * contacts_tableとのリレーション（主テーブル側）
     */

    public function post() {
        return $this->hasMany(Contact::class);
    }

    // 部署情報の削除
    public function departmentDelete($id) {
        Department::find($id)->delete();

        return redirect(route('top-admin-department'));
    }
}
