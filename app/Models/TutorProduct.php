<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorProduct extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

}
