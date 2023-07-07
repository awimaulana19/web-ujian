<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataRequest extends FormRequest
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
        $mahasiswaId = $this->route('id');
        
        return [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users,username,'.$mahasiswaId,
            'jk' => 'required|string|max:50',
            'foto' => 'mimes:png,jpg,jpeg|max:10240',
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
            'username.unique' => 'NIM Sudah Ada',
            'jk.required' => 'Jenis kelamin tidak boleh kosong',
            'jk.string' => 'Jenis kelamin harus bertipe string',
            'jk.max' => 'Jenis kelamin maximal 50 karakter',
            'foto.mimes' => 'Foto harus berformat png, jpg atau jpeg',
            'foto.max' => 'Foto maximal 10 MB',
        ];
    }
}
