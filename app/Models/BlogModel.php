<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class BlogModel extends Model
{  
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = ['id', 'title','description','user_id','rp_version','min_engine_version','status','link','type','img'];

    public function comments(){
        return $this->hasMany(BlogComment::class, 'blog_id');
    }

}
