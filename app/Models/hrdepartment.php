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



    ];
}
