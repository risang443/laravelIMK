<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{

    public function show(Post $post){
        return view('post', [
            "title" => $post->title,
            "post" => $post
        ]);
    }

    public function blog(){

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('blog', [
            'title' => 'Blog',
            "posts" => Post::latest()->filter(request(['search', 'category','author']))->paginate()->withQueryString(),
            'categories' => Category::all(),
        ]);
    }

    public function aktivitas(){
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('aktivitas', [
            'title' => 'Aktivitas',
            "posts" => Post::latest()->where('category_id',1)->filter(request(['search', 'category','author']))->paginate(9)->withQueryString()
        ]);
    }

    public function informasi(){
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('informasi', [
            'title' => 'Informasi',
            "posts" => Post::latest()->where('category_id',5)->filter(request(['search', 'category','author']))->paginate(9)->withQueryString()
        ]);
    }

        // public function index(){
    //     $title ='';
    //     if(request('category')){
    //         $category = Category::firstWhere('slug', request('category'));
    //         $title = $category->name;
    //     }

    //     if(request('author')){
    //         $author = User::firstWhere('username', request('author'));
    //         $title = ' by ' . $author->name;
    //     }

    //     return view('posts', [
    //         "title" => $title,
    //         "posts" => Post::latest()->filter(request(['search', 'category','author']))->paginate(9)->withQueryString()
    //     ]);
    // }
}