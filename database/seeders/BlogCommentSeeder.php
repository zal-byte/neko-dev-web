<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogComment;
use Illuminate\Support\Facades\Auth;

class BlogCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $msg = array("Hello", "nice article","good work");

        foreach( $msg as $mgs ){
            $comment = new BlogComment();
            $comment->user_id = "1";
            $comment->blog_id = "1";
            $comment->msg = $mgs;
            $comment->save();
        }

    }
}
