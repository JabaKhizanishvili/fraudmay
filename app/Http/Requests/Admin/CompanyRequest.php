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
use Illuminate\Validation\Rule;

/**
 * Class ProjectRequest
 * @package App\Http\Requests\Admin
 */
class CompanyRequest extends FormRequest
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
        // Check if method is get,fields are nullable.
        if ($this->method() === 'GET') {
            return [];
        }

        return [
            'slug' => ['required', 'alpha_dash', Rule::unique('companies', 'slug')->ignore($this->company)],
            config('translatable.fallback_locale') . '.title' => 'required|string',
            config('translatable.fallback_locale') . '.content_1' => 'required|string',
            config('translatable.fallback_locale') . '.content_2' => 'required|string',
            config('translatable.fallback_locale') . '.description' => 'required|string',
            'youtube_link' => 'nullable|string|max:255',
        ];
    }
}
