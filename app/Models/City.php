<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function staff_detail()
    {
        return $this->hasMany(StaffDetail::class);
    }
}
