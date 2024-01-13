<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->is_admin){
            return view('dashboard.posts.index', [
                'posts' => Post::latest()->get(),
                'title' => 'Laporan',
            ]);
        }
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
            'title' => 'Laporan',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all(),
            'title' => 'Buat Laporan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'images' => 'array',
            'namad' => 'required',
            'namab' => 'required',
            'nik' => 'required',
            'ttl' => 'required',
            'email' => 'required',
            'notelp' => 'required',
            'alamat' => 'required',
            'body' => 'required'
        ]);

        $images = [];

        if($request->images){
            foreach ($validatedData['images'] as $image) {
                $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image_path =  $image->storeAs('post-images', $fileName,'public');

                array_push($images, $image_path);
            }
        }
        
        $validatedData['images'] = $images;

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);
        return redirect('/dashboard')->with('success','Terima kasih! Data Anda Berhasil Terkirim');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit',[
            'post' => $post,
            'title' => $post->title,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            // 'images' => 'array',
            'namad' => 'required',
            'namab' => 'required',
            'nik' => 'required',
            'ttl' => 'required',
            'email' => 'required',
            'notelp' => 'required',
            'alamat' => 'required',
            'body' => 'required'
        ];

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        // $images = [];

        // if($request->file('images')){
        //     if($post->images){
        //         Storage::delete($post->images);
        //     }
        //     foreach ($validatedData['images'] as $image) {
        //         $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
        //         $image_path =  $image->storeAs('post-images', $fileName,'public');
    
        //         array_push($images, $image_path);
        //     }
        // }

        // $validatedData['images'] = $images;

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)
            ->update($validatedData);
        return redirect('/dashboard/posts')->with('success','Post has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->images){
            Storage::delete($post->images);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success','Post has been deleted');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}