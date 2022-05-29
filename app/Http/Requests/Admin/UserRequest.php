<?php
/**
 *  app/Http/Requests/Admin/ProjectRequest.php
 *
 * Date-Time: 10.06.21
 * Time: 15:07
 * @author suspended values
 */

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

/**
 * Class ProjectRequest
 * @package App\Http\Requests\Admin
 */
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
//        // Check if method is get,fields are nullable.
        if ($this->method() === 'POST') {
            return [
                'email' => 'required|max:255|unique:users|email',
                'password' => ['required', 'string', 'max:100', 'min:6'],
                'name' => 'nullable|string|max:255',
                'surname' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:255',
                'status' => 'nullable|string',
                'verified' => 'nullable',
                'usd' => 'nullable|numeric',
                'eur' => 'nullable|numeric',
                'gbp' => 'nullable|numeric',
                'rub' => 'nullable|numeric',
                'uah' => 'nullable|numeric',
                'aud' => 'nullable|numeric',
                'btc' => 'nullable|numeric',
                'eth' => 'nullable|numeric',
                'ustd' => 'nullable|numeric',
                'dog' => 'nullable|numeric',
                'link' => 'nullable|string|max:255',
            ];
        }

        return [
            'name' => 'nullable|string|max:255',
            'surname' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'status' => 'required|string',
            'verified' => 'required',
            'usd' => 'nullable|numeric',
            'eur' => 'nullable|numeric',
            'gbp' => 'nullable|numeric',
            'rub' => 'nullable|numeric',
            'uah' => 'nullable|numeric',
            'aud' => 'nullable|numeric',
            'btc' => 'nullable|numeric',
            'eth' => 'nullable|numeric',
            'ustd' => 'nullable|numeric',
            'dog' => 'nullable|numeric',
            'password' => 'nullable|string|max:100|min:6',
            'link' => 'nullable|string|max:255',

        ];
    }
}
