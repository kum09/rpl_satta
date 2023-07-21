<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'mobile_number',
        'email',
        'advertisement_title',
        'advertisement_desc',
        'advertisement_status',
        'created_at',
        'updated_at'
    ];
}
