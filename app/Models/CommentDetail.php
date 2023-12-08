<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function project_detail()
    {
        return $this->belongsTo(ProjectDetail::class);
    }

    // public function project()
    // {
    //     return $this->project_detail()->belongsTo(Project::class);
    // }
}
