<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'suffix' => 'nullable|string',
            'department_name' => 'required',
            'position_name' => 'required',
            'basic_pay' => 'required|numeric',
            'allowance' => 'required|numeric',
            'current_address' => 'nullable|string',
            'email_address' => 'nullable|string',
            'phone_number' => 'nullable|regex:/^9[0-9]{9}$/',
            'sex' => 'nullable|string',
            'age' => 'nullable|numeric',
            'per_month' => 'nullable|numeric',
            'per_day' => 'nullable|numeric',
            'per_bi_month' => 'nullable|numeric',
            'actual_days_worked' => 'nullable|numeric',
            'absences' => 'nullable|numeric',
            'vlsl' => 'nullable|numeric',

        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('phone_number')) {
            $this->merge([
                'phone_number' => '+63' . $this->phone_number,
            ]);
        }
    }
}
