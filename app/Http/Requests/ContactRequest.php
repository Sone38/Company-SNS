<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nameOfForm' => 'max:50',
            'departmentOfForm' => 'required',
            'titleOfForm' => 'required|max:100',
            'bodyOfForm' => 'required',
        ];
    }

    public function massages() {
        return [
            'nameOfForm.max' => '50文字以内で入力してください。',
            'departmentOfForm.required' => '部署を選択してください。',
            'titleOfForm.required' => 'タイトルを入力してください。',
            'titleOfForm.max' => '100文字以内で入力してください。',
            'bodyOfForm.required' => '問い合わせ内容を入力してください。',
        ];
    }
}
