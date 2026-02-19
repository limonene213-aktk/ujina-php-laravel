<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if($this->path() == 'hello')
            {
                return true;
            }else{
        return false; //falseの場合には、HttpExceptionエラーが出るようになる
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //さきほどまでコントローラーにあった処理の配列と同じ
        return [
            'name' => 'required', 
            'mail'=> 'required|email',
            'age' => 'required|numeric|between:0,150', 
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'必須項目です',
            'mail.required'=>'必須項目です',
            'age.required'=>'年齢は隠せませんよ？（暗黒微笑）',
            'mail.email'=>'emailの形式で入力してください',
            'age.numeric'=>'年齢は整数で入力してください',
            'age.between'=>'そんな年齢のわけないやろ？',
        ];
    }

}

