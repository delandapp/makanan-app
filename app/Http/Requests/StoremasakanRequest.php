<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class StoremasakanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'unique:masakans|required',
            'desc' => 'min:10|required',
            'harga' => 'min:4|required'
        ];
    }

    public function messages()
    {
        return [
            'nama.unique' => 'Maaf nama sudah digunakan' ,
            'nama.required' => 'Maaf lengkapi input nama anda',
            'desc.min' => 'Maaf anda harus menulis lebih :min karakter',
            'harga.min' => 'Maaf anda harus menulis lebih :min karakter' 
        ];
    }
}
