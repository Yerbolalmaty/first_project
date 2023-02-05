<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            dump($post->content);
        }
        dd('end');
    }

    public function create()
    {
        $postArr = [
            [
                'title' => 'Dog',
                'content' => 'Dog is good',
                'image' => 'dog.jpg',
                'likes' => 20,
                'is_published' => 1,
            ], [
                'title' => 'Cat',
                'content' => 'Cat is beauty',
                'image' => 'cat.jpg',
                'likes' => 50,
                'is_published' => 0,
            ]
        ];
        foreach ($postArr as $arr) {

            Post::create($arr);
        }


        dd('created');
    }

    public function update()
    {
        $posts = Post::find(6);
        $posts->update([
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 56,
            'is_published' => 1,
        ]);
        dd('updated');
    }
    public function delete(){
        $posts = Post::withTrashed()->find(1);
//        $posts->delete();
        $posts->restore();
        dump('deleted');
    }
    //firstOrCreate
    //updateOrCreate
    public function firstOrCreate(){

       $posts = Post::firstOrCreate([
            'title' => 'Cat',
        ],[
            'title' => 'Cat',
            'content' => 'some content',
            'image' => ' some image',
            'likes' => 5000,
            'is_published' => 1,
        ]);
        dump($posts->content);
        dd('finished');
    }
    public function updateOrCreate(){
        $posts = Post::updateOrCreate([
            'title' => 'Cato',
        ],[
            'title' => 'Cat0',
            'content' => 'Cat is smart',
            'image' => 'Cat.png',
            'likes' => 55,
            'is_published' => 0,
        ]);
        dump($posts->title);
        dd('finished');
    }

}
