<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';
    protected $perPage = 10;
    protected $fillable = [
        'id',
        'full_name',
        'birthday',
        'address',
        'phone',
        'email',
        'user_name',
        'password',
        'status',
        'created_by',
        'updated_by',
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
}
