<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function new(){
        return view('posts/new');
    }

    public function store(Request $request){
        //dd($request);
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user()->id;

        $path = Storage::disk('public')->put('photos',$request->file('cover_image'));
        $post->cover_image = $path;

        $post->save();
        return redirect('posts')->with('status', 'Blog Post Form Data Has Been inserted');
        
    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts/edit',array('post'=>$post));
    }

    public function update(Request $request, $id){
        $post = Post::find($id);
        $validatedData = $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        if($request->hasFile('cover_image')){
            $newImg = $request->validate([
                'cover_image' =>'required','image'
            ]);
            $oldImg = $post->cover_image;
            Storage::delete($oldImg);
            $path = Storage::disk('public')->put('photos',$request->file('cover_image'));
            $validatedData['cover_image'] = $path;
        }

        $post->update($validatedData);
        return redirect('posts')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function delete(Request $request, $id){
        $post = Post::find($id);
        $post->delete();
        return response()->json(['stato'=>'ok']);
    }
}
