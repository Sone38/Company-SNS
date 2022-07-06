<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    // 登録されている部署のデータを取得
    public function GetDepartmentData() {
        $DepartmentDatas = Department::all();

        return view('top-admin.top-admin-department', compact('DepartmentDatas'));
    }

    public function GetDepartmentDataForRegister() {
        $NamesOfDepartment = Department::all();

        return view('auth.register', compact('NamesOfDepartment'));
    }

    public function GetDepartmentDataForForm() {
        $NamesOfDepartment = Department::all();

        return view('general-form', compact('NamesOfDepartment'));
    }

    // 部署を登録する処理
    public function DepartmentStore(Request $request) {
        Department::create([
            'name' => $request->nameOfDepartment,
        ]);

        return redirect()->route('top-admin-department');
    }

    // 部署情報の編集
    public function departmentEdit($id) {
        $getDepartmentDataForEdit = Department::find($id);

        return view('top-admin.top-admin-department-edit', compact('getDepartmentDataForEdit'));
    }

    public function departmentEdited(Request $request, $id) {
        $editedDepartmentName = $request->editedDepartmentName;
        DB::table('departments')
            ->where('id', '=', $id)
            ->update(['name' => $editedDepartmentName]);

        return redirect()->route('top-admin-department');
    }

}