<?php
namespace App\Http\Controllers;

use App\Repository\PostRepository;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    protected $posts;
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function index()
    {
        return $this->posts->with(['user', 'comments'])->paginate(10);
    }

    public function show($id)
    {
        return $this->posts->with(['user', 'comments'])->findOrFail($id);
    }

    public function store(PostRequest $request)
    {
        $this->posts->create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Post Created Successfully'], 201);
    }

    public function update(PostRequest $request, $id)
    {
        $this->posts->findOrFail($id)->update(['content' => $request->get('content')]);
        return response()->json(['status' => 'success', 'message' => 'Post Updated Successfully'], 202);
    }

    public function delete($id)
    {
        $this->posts->findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Post Deleted Successfully'], 202);
    }
}
