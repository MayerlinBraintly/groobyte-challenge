<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class Subscription extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'customer_id' => 'required|integer',
            'service' => 'required|in:Basic,Premium',
            'start_date' => 'required|date_format:Y-m-d'
        ];
    }
}
