<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =Post::latest()->paginate(2);
        
        // dd($posts);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a
     *  new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:10',
            'imageFile'=>'image|max:2000'
        ]
        );

        // dd($request);
        $post = new Post;
        $title = $request->title;
        $content = $request->content;

        $post->title=$title;
        $post->content=$content;
        $post->user_id=Auth::user()->id;
        // dd($post);
            if($request->file('imageFile')){
                $post->image=$this->uploadPostImage($request);
            }
        $post->save();
        return redirect(route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post=Post::find($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:10',
            'imageFile'=>'image|max:2000'
        ]
        );

        $post = Post::find($id);
        // dd($request);
        $title = $request->title;
        $content = $request->content;

        $post->title=$title;
        $post->content=$content;
        if($request->file('imageFile')){
            $path = 'public/images/';
            // dd($path.$post->image);
            Storage::delete($path.$post->image);
            $post->image=$this->uploadPostImage($request);
        }
        $post->save();
        // laravelProject\storage\app\public\images\fukuoka_1625566823.jpg
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect(route('posts.index'));
    }

    protected function uploadPostImage($request){
        $name = $request->file('imageFile')->getClientOriginalName();
        $extension = $request->file('imageFile')->extension();
        $nameWithOutExtension = Str::of($name)->basename('.'.$extension);
        $fileName=$nameWithOutExtension.'_'.time().'.'.$extension;
        // dd($fileName);
        $request->file('imageFile')->storeAs('public/images',$fileName);
        return $fileName;
    }
}
