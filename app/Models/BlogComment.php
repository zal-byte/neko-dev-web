<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class BlogComment extends Model
{
    use HasFactory;
    protected $table = "blog_comment";

    protected $fillable = ['id','msg', 'user_id', 'blog_id'];

    public function blog(){
        return $this->belongsTo(BlogModel::class);
    }
}

