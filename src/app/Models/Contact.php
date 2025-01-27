<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'gender',
        'tel',
        'address',
        'building',
        'categry_id',
        'detail',
    ];
}
