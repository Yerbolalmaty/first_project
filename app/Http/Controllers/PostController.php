<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));


    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',

        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }


    public function update(Post $post)
    {
        $data = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',

        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $posts = Post::withTrashed()->find(1);
        $posts->delete();
//        $posts->restore();
        dump('deleted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');

    }
//    //firstOrCreate
//    //updateOrCreate
//    public function firstOrCreate(){
//
//       $posts = Post::firstOrCreate([
//            'title' => 'Cat',
//        ],[
//            'title' => 'Cat',
//            'content' => 'some content',
//            'image' => ' some image',
//            'likes' => 5000,
//            'is_published' => 1,
//        ]);
//        dump($posts->content);
//        dd('finished');
//    }
//    public function updateOrCreate(){
//        $posts = Post::updateOrCreate([
//            'title' => 'Cato',
//        ],[
//            'title' => 'Cat0',
//            'content' => 'Cat is smart',
//            'image' => 'Cat.png',
//            'likes' => 55,
//            'is_published' => 0,
//        ]);
//        dump($posts->title);
//        dd('finished');
//    }

}
