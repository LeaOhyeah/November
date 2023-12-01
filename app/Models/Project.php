<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function project_image()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function following()
    {
        return $this->hasMany(Following::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function project_detail()
    {
        return $this->hasMany(ProjectDetail::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
