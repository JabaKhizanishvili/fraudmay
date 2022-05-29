<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UploadDocumentRequest extends FormRequest
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
            'document_type' => Rule::requiredIf($this->document),
            'document' => [Rule::requiredIf($this->document_type), 'max:15360'],
            'bank_statement' => 'max:15360',
            'selfie_with_document' => 'max:15360'
        ];
    }
}
