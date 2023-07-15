<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{ 
    use HasFactory;
    protected $fillable = [
        'id',
        'date',
        'result_time',
        'result',
        'result_status',
        'updated_by',
        'created_by',
        'updated_by'
    ];
}
