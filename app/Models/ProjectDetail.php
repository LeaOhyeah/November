<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function comment_detail()
    {
        return $this->hasMany(CommentDetail::class);
    }

    public function getCommentCountAttribute(): int
    {
        return (int) $this->comment_detail()->where('project_detail_id', $this->id)->count();
    }
}
