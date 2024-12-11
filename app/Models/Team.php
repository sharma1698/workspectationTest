<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'tutor_product_id',
        'name',
        'contact',
        'website',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function tutorProduct()
    {
        return $this->belongsTo(TutorProduct::class);
    }
}
