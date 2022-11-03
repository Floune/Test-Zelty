<?php

namespace App\Http\Services;

use App\Models\Post;

class SetPublicationDate
{

    public static function handle($post)
    {
        if ($post->status === "PUBLISHED") {
            $post->publication_date = now();
        }
    }
}
