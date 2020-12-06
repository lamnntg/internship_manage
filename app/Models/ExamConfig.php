<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamConfig extends Model
{
    use SoftDeletes;

    protected $table = 'exam_configs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
    ];

    protected $dates = ['deleted_at'];

    /*
     * relation exam config 1-n exam config detail function.
     */ 
    public function examConfigDetails()
    {
        return $this->hasMany(ExamConfigDetail::class);
    }
}
