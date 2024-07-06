<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class departmentlist extends Model
{
    use HasFactory;

    protected $table ='departmentlist';

    protected $fillable = [
        'department',
    ];
}
