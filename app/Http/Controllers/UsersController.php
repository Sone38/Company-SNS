<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    // 総管理者用全ユーザー情報の取得
    public function allDataOfUser() {
        $users = DB::table('users')
                    ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
                    ->select('users.id', 'users.name AS userName', 'users.kana', 'departments.name AS departmentName')
                    ->orderBy('users.id')
                    ->paginate(8);

        return view('top-admin.top-admin-user', compact('users'));
    }

    // 一般用全ユーザー情報の取得
    public function allDataOfUserForGeneral() {
        $users = DB::table('users')
                    ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
                    ->select('users.id', 'users.name AS userName', 'users.kana', 'departments.name AS departmentName')
                    ->orderBy('users.id')
                    ->paginate(8);

        return view('general-user', compact('users'));
    }

    public function UserDataForHeader($id) {
        $UserData = User::find($id);

        return redirect(__DIR__."/user", compact('UserData'));
    }

    // idからユーザー情報を取得
    public function UserDataFromId($id) {
        $getDepartments = DB::table('departments')
                            ->get();
        //dd($getDepartments);

        $UserDataFromId = DB::table('users')
                            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
                            ->where('users.id', '=', $id)
                            ->select('users.id', 'users.name AS userName', 'users.kana', 'users.email', 'departments.name AS departmentName')
                            ->get();
        
        //dd($UserDataFromId);                    
        return view('top-admin.top-admin-user-edit', compact('UserDataFromId', 'getDepartments'));
    }

    public function EditUserInformationStore(Request $request, $id) {
        $editedUserInformation = User::find($id);

        // バリデーション
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'kana' => 'required|max:50',
            'email' => 'required',
            'department_id' => 'required',
        ]);

        // バリデーションエラー
        //if($validator->fails()) {
        //    return redirect(route('top-admin-user'))
        //    ->withInput()
        //    ->withErrors($validator);
        //}


        //dd($request->departmentOfUser);
        $departmentName = $request->departmentOfUser;
        $departmentNameToId = DB::table('departments')
                                ->leftJoin('users', 'users.department_id', '=', 'departments.id')
                                ->where('departments.name', '=', $departmentName)
                                ->select('departments.id')
                                ->first('department_id');
        //dd($departmentNameToId->id);

        // 登録処理
        $editedUserInformation->name = $request->name;
        $editedUserInformation->kana = $request->kana;
        $editedUserInformation->email = $request->email;
        $editedUserInformation->department_id = $departmentNameToId->id;
        $editedUserInformation->save();

        return redirect(route('top-admin-user'));
    }
}
