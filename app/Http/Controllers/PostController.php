<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showCreateForm() {
        // Checks if a user is not logged in. So when its true (the user
        // is not logged in) the user will get redirected. This is an
        // example of what middleware solves really easily, but leave
        // it so you can learn from it.
        // if (!auth()->check()) {
        //     return redirect('/');
        // }
        return view('create-post');
    }

    public function storeNewPost(Request $request) {
                // validate the incoming request
                $incomingFields = $request->validate([
                    'title' => ['required'],
                    'body' => ['required']
                ]);

                // Strip the incoming request from malicious html with php strip_tags function
                $incomingFields['title'] = strip_tags($incomingFields['title']);
                $incomingFields['body'] = strip_tags($incomingFields['body']);
                $incomingFields['user_id'] = auth() ->user()->id;

                // registers a blog post in the DB
                $newPost = Post::create($incomingFields);

                return redirect("/post/{$newPost->id}")->with('success','Blog post created. Make another one!');
    }

    public function viewSinglePost (Post $post) {
        // This method allows for markdown functionality. In the 
        // strip_tags function we specify what tags are allowed. These
        // tags will actually not be stripped.
        $post['body'] = strip_tags(Str::markdown($post->body), '<p><ul><li><ol><h1><h2><h3><h4><br><table><th><td>');
        // pass down the view with the data from the DB
        return view('single-post', ['post'=> $post]);
    }
}