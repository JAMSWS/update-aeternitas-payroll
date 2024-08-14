<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class payrollperiod extends Model
{
    use HasFactory;

    protected $table ='payrollperiod';

    protected $fillable = [
        'startpayrollperiod',
        'endpayrollperiod',
    ];
}
