<?php

namespace App\Http\Controllers\API;

use App\Events\PostCreation;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Services\Filter;
use App\Http\Utils\Response;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(PostRequest $request) {
        return (new Filter($request->all(), Auth::user()))->run();
    }
    public function create(PostCreateRequest $request) {
        $post = new Post($request->all());
        Auth::user()->posts()->save($post);
        event(new PostCreation(Auth::user(), $post));
        return Response::success($post, "Post created");
    }

    public function update(PostUpdateRequest $request) {
        $post = Post::find($request->input("post_id"));
        $post->update($request->except(["post_id"]));
        return Response::success($post, "Post updated");
    }

    public function delete($id) {
        Post::find($id)->delete();
        return Response::success("success", "Post deleted");
    }
}
