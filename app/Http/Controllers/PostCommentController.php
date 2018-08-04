<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Notifications\UserCommented;
use App\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    /**
     * Store a new comment for the given post
     *
     * @param  string $slug the post slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($slug)
    {
        // Find post by slug or throw exception
        $post = Post::slug($slug)->firstOrFail();

        // Validate comment input
        $this->validate(
            request(),
            ['body' => 'required|string'],
            ['required' => 'A comment usually has something in it xD']
        );

        // Create comment for post
        $comment = $post->createComment([
            'body' => request('body'),
            'comment_id' => request('comment_id'),
        ]);

        // Notify me when someone comments
        me()->notify(new UserCommented($comment));

        // Redirect back to the post
        return redirect()->route('post.show', ['slug' => $post->slug]);
    }
}
