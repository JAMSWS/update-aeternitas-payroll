<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class attendancelist extends Model
{
    use HasFactory;

    protected $table ='attendance';
    protected $fillable = [
        'employee_id', 'employee_name', 'date', 'time_in', 'time_out', 'present', 'remarks',
    ];

    public function employee()
    {
        return $this->belongsTo(hrdepartment::class, 'employee_id');
    }
}
