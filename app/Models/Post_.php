<?php

namespace App\Models;


class Post {
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Farhan Aufar",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error maxime assumenda alias fugiat nisi beatae ipsa nemo maiores, sit quod?
            "
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Farhan Aja",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa veniam porro distinctio optio natus, quaerat dolorem deleniti amet nihil quod quasi aut veritatis quis laudantium ipsam quas temporibus voluptatibus excepturi explicabo, velit ut perspiciatis tenetur quia recusandae! Quisquam optio et porro id quos totam quis, labore, aspernatur soluta incidunt reiciendis, repellendus repellat ipsum? Itaque dolores in pariatur, optio odio commodi, cumque, dolor quidem impedit nobis dolorum quia aliquam ex blanditiis.
            "
        ],
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
    //     // $post = [];
    //     // foreach($posts as $p) {
    //     // if($p["slug"] === $slug) {
    //     //     $post = $p;
    //     // }
    // }
        return $posts->firstWhere('slug', $slug);

    }


}
