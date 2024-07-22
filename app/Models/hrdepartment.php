<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class hrdepartment extends Model
{
    use HasFactory;

    protected $table ='employee';

    protected $fillable = [
        'employee_name',
        'first_name',
        'last_name',
        'suffix',
        'department_name',
        'position_name',
        'phone_number',
        'email_address',
        'current_address',
        'pay_type',
        'per_day',
        'per_month',
        'sss_number',
        'philhealth_number',
        'pagibig_number',
        'tin_number',
        'monthly_compensation',
        'number_dependents',
        'name_dependents',
        'emergency_name',
        'emergency_phonenumber',
        'emergency_relationship',
        'emergency_address',
        'seperation_date',
        'seperation_reason',
        'seperation_remarks',
        'basic_pay',
        'allowance',
        'sex',
        'per_bi_month',
        'actual_days_worked',
        'absences',
        'vlsl',
        'regular_worked_days',
        'rwd_amount',
        'leave_amount',
        'legal_worked_days',
        'lhd_amount',
        'special_rate',
        'special_worked_days',
        'special_amount',
        'total_basic_pay',
        'overtime_rate25',
        'ot_hours25',
        'ot_amount25',
        'overtime_rate30',
        'ot_hours30',
        'ot_amount30',
        'overtime_rate100',
        'ot_hours100',
        'ot_amount100',
        'total_ot',
        'total_basic_pay_plus_ot',
        'nd_rate',
        'nd_hours',
        'nd_amount',




    ];
}
