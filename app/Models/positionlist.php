<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class positionlist extends Model
{
    use HasFactory;

    protected $table ='positionlist';

    protected $fillable = [
        'position',
    ];
}
