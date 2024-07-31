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
            'regular_worked_days' => 'nullable|numeric',
            'rwd_amount' => 'nullable|numeric',
            'leave_amount' => 'nullable|numeric',
            'legal_worked_days' => 'nullable|numeric',
            'lhd_amount' => 'nullable|numeric',
            'special_rate' => 'nullable|numeric',
            'special_worked_days' => 'nullable|numeric',
            'special_amount' => 'nullable|numeric',
            'total_basic_pay' => 'nullable|numeric',
            'overtime_rate25' => 'nullable|numeric',
            'ot_hours25' => 'nullable|numeric',
            'ot_amount25' => 'nullable|numeric',
            'overtime_rate30' => 'nullable|numeric',
            'ot_hours30' => 'nullable|numeric',
            'ot_amount30' => 'nullable|numeric',
            'overtime_rate100' => 'nullable|numeric',
            'ot_hours100' => 'nullable|numeric',
            'ot_amount100' => 'nullable|numeric',
            'total_ot' => 'nullable|numeric',
            'total_basic_pay_plus_ot' => 'nullable|numeric',
            'nd_rate' => 'nullable|numeric',
            'nd_hours' => 'nullable|numeric',
            'nd_amount' => 'nullable|numeric',
            'late_rate' => 'nullable|numeric',
            'number_of_minutes_late' => 'nullable|numeric',
            'late_amount' => 'nullable|numeric',
            'missing_charges' => 'nullable|numeric',
            'total_charges' => 'nullable|numeric',
            'half_allowance' => 'nullable|numeric',
            'meal_allowance' => 'nullable|numeric',
            'grosspay' => 'nullable|numeric',

            'sss_premcontribution' => 'nullable|numeric',
            'sss_wisp' => 'nullable|numeric',
            'phic' => 'nullable|numeric',
            'hdmf' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'sss_loan' => 'nullable|numeric',
            'hdmf_loan' => 'nullable|numeric',
            'uniform' => 'nullable|numeric',

            'employer_sss_premcontribution' => 'nullable|numeric',
            'employer_sss_wisp' => 'nullable|numeric',
            'employer_phic' => 'nullable|numeric',
            'employer_hdmf' => 'nullable|numeric',

            'tax_sss_premcontribution' => 'nullable|numeric',
            'tax_sss_wisp' => 'nullable|numeric',
            'tax_phic' => 'nullable|numeric',
            'tax_hdmf' => 'nullable|numeric',
            'totalremittance' => 'nullable|numeric',
            'taxable_income' => 'nullable|numeric',
            'tax_cl' => 'nullable|numeric',
            'tax_excess' => 'nullable|numeric',

            'tax_rate_percentage' => 'nullable|numeric',
            'tax_rate' => 'nullable|numeric',
            'fixed_rate' => 'nullable|numeric',
            'tax_month' => 'nullable|numeric',
            'tax_cutoff' => 'nullable|numeric',





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
