<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactRequest;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    public function __construct() {
        $this->Contact = new Contact;
    }

    // データの取得
    public function GetFormDataFromDatabase() {
        $FormDatas = DB::table('contacts')
                        ->leftJoin('departments', 'contacts.department_id', '=', 'departments.id')
                        ->select('contacts.id', 'contacts.name AS formByName', 'departments.name AS formByDepartmentName', 'contacts.title')
                        ->orderBy('contacts.created_at', 'desc')
                        ->get();
        
        //dd($FormDatas['0']);
        return view('top-admin.top-admin-form', compact('FormDatas'));
    }

    public function GetFormDataFromDatabaseForDetail($id) {
        $FormDatas = DB::table('contacts')
                        ->leftJoin('departments', 'contacts.department_id', '=', 'departments.id')
                        ->select('contacts.id', 'contacts.name AS formByName', 'departments.name AS formByDepartmentName', 'contacts.title', 'contacts.body')
                        ->where('contacts.id', '=', $id)
                        ->get();

        return view('top-admin.top-admin-form-detail', compact('FormDatas'));
    }

    public function FormConfirm(Request $request, ContactRequest $ContactRequest) {
        $getDepartmentId = $request->departmentOfForm;
        $department = Department::where('id', '=', $getDepartmentId)->first('name');

        $getName = $request->nameOfForm;
        if($getName == NULL) {
            $getName = '匿名';
        }

        $formInputInformation = [
            'name' => $getName,
            'department' => $department['name'],
            'title' => $request->titleOfForm,
            'body' => $request->bodyOfForm,
            'user_id' => Auth::user()->id,
        ];

        return view('general-form-confirm', compact('formInputInformation'));
    }

    // バリデーション
    public function formValidation(ContactRequest $request) {
        // バリデーションでエラーがなかったら↓に遷移
        return view('general-form-confirm');
    }

    // 登録処理
    public function FormComplete(Request $request) {
        if($request->formConfirmName == NULL) {
            $request->formConfirmName = '匿名';
        }
        $getDepartmentName = $request->formConfirmDepartment;
        $formConfirmDepartment_id = Department::where('name', '=', $getDepartmentName)->first('id');
        Contact::create([
            'name' => $request->formConfirmName,
            'department_id' => $formConfirmDepartment_id['id'],
            'body' => $request->formConfirmBody,
            'user_id' => Auth::user()->id,
            'title' => $request->formConfirmTitle,
        ]);

        return view('general-form-complete');
    }
}
