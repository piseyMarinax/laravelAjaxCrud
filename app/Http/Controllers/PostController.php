<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;
use response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index',compact('posts'));
    }

    public function addPost(Request $req)
    {
        $rules = array(
            'title' => 'required',
            'body' => 'required',
        );

        $validator = Validator::make (Input::all(),$rules);
        if($validator->fails())
        {
            return response::json_decode(array('errors' => $validator->getMessageBag()->toarray()));
        }
        else
        {
            $post = new Post();
            $post->titl =  $req->title;
            $post->body =  $req->body;
            $post->save();
            return response()->json($post);
        }
    }
}
