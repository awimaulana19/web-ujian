<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:50',
            'jk' => 'required|string|max:50',
            'foto' => 'required|mimes:png,jpg,jpeg|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.string' => 'Nama harus bertipe string',
            'nama.max' => 'Nama maximal 255 karakter',
            'username.required' => 'Username tidak boleh kosong',
            'username.string' => 'Username harus bertipe string',
            'username.max' => 'Username maximal 50 karakter',
            'password.required' => 'Password tidak boleh kosong',
            'password.string' => 'Password harus bertipe string',
            'password.max' => 'Password maximal 50 karakter',
            'jk.required' => 'Jenis kelamin tidak boleh kosong',
            'jk.string' => 'Jenis kelamin harus bertipe string',
            'jk.max' => 'Jenis kelamin maximal 50 karakter',
            'foto.required' => 'Foto tidak boleh kosong',
            'foto.mimes' => 'Foto harus berformat png, jpg atau jpeg',
            'foto.max' => 'Foto maximal 10 MB',
        ];
    }
}
