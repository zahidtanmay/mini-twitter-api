<?php

namespace App\Http\Controllers;

use App\Repository\CommentRepository;
use App\Http\Requests\CommentRequest;
use App\Repository\PostRepository;

class CommentController extends Controller
{
    protected $comments;
    protected $posts;

    public function __construct(PostRepository $posts, CommentRepository $comments)
    {
        $this->comments = $comments;
        $this->posts = $posts;
    }

    public function store(CommentRequest $request, $id)
    {
        $this->posts->findOrFail($id);
        $this->comments->createComment($request->all(), $id);
        return response()->json(['status' => 'success', 'message' => 'Comment Created Successfully'], 201);
    }

    public function delete($id)
    {
        $this->comments->findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Comment Deleted Successfully'], 202);
    }
}
