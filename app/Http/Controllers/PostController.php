<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use App\HttpResponses;
use App\Models\Post;

class PostController extends Controller
{
    use HttpResponses;

    public function index() {
        return PostResource::collection(Post::all());
    }

    public function store(StorePostRequest $request){
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        $validated['user_first'] = Auth::user()->first;
        $validated['user_last'] = Auth::user()->last;
        $post = Post::create($validated);
        return $this->success(['post' => new PostResource($post)], 'Post was created successfully', 201);
    }

    public function show($id) {
        return new PostResource(Post::findOrFail($id));
    }

    public function update(StorePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        if (!$post) {
            return $this->error([], 'Post not found', 404);
        }

        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        $validated['user_first'] = Auth::user()->first;
        $validated['user_last'] = Auth::user()->last;

        $post->update($validated);

        return $this->success(['post' => new PostResource($post)], 'Post was updated successfully', 200);
    }



    public function destroy(Post $post)
    {
        if (Auth::user()->id !== $post->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
        $post->delete();

        return $this->success([], 'Post deleted successfully', 200);
    }
}
