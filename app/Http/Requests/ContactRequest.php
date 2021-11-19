<?php

namespace App\Http\Requests;

use App\Rules\JapaneseZip;
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
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'postcord' => ['required', new JapaneseZip],
            'address' => 'required',
            'opinion' => 'required|max:120'
        ];
    }

    public function messages()
    {
        return[
            'firstName.required' => '苗字は必須項目です。',
            'lastName.required' => '名前は必須項目です。',
            'gender.required' => '性別は必須項目です。',
            'email.required' => 'メールアドレスは必須項目です。',
            'email.email' => 'メールアドレス形式の形式で入力してください。',
            'postcord.required' => '郵便番号は必須項目です。',
            'address.required' => '住所は必須項目です。',
            'opinion.required' => 'ご意見は必須項目です。',
            'opinion.max:120' => '120字以内です。'
        ];
    }

}
