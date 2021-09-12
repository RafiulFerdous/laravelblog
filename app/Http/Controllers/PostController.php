<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Time;
use Session;
use Carbon\Carbon;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create',compact(['categories','tags']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $tags = Tag::all();
        $post = Post::all();

        $validated = $request->validate([
            'title' => 'required|unique:posts,title',
            'image' => 'required|image',
            'description' => 'required',
            'category' => 'required',

        ]);


        //store


        $post = Post::create([
            'title'=> $request->title,
            'slug'=>$slug = Str::of('$request->name')->slug('-'),
            'image'=>'image.jpg',
            'description'=>$request->description,
            'category_id'=>$request->category,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ]);

        $post->tags()->attach($request->tags);

        if($request->has('image')){
            $image = $request->image;
            $image_new_name = Time() . '_' . $image->getClientOriginalExtension();
            $image->move('storage/post/',$image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
            $post->save();
        }

        Session::flash('success','Post created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit', compact(['post','categories', 'tags']));
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
        //validation
        $validated = $request->validate([
            'title' => 'required|unique:posts,title',

            'description' => 'required',
            'category' => 'required',

        ]);


        //store
        $post->tags()->sync($request->tags);



        $post->title= $request->title;
        $post->slug=$slug = Str::of('$request->name')->slug('-');
        //$post->image='image.jpg';
        $post->description=$request->description;
        $post->category_id=$request->category;

        //$post->save();


        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = Time() . '_' . $image->getClientOriginalExtension();
            $image->move('storage/post/',$image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
            $post->save();
        }
        $post->save();

        Session::flash('success','Post updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
