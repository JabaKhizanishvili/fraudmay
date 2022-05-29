<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
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
            'password' => ['required', 'string', 'max:100', 'min:6', function ($attribute, $value, $fail) {
                if (Hash::check($value, auth()->user()->password)) {
                    $fail('New password should be different');
                }
            }],
            'repeat_password' => 'required|string|same:password',
        ];
    }
}
