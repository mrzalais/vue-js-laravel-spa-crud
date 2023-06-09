<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $orderColumn = request('order_column', 'created_at');
        if (!in_array($orderColumn, ['id', 'title', 'created_at'])) {
            $orderColumn = 'created_at';
        }

        $orderDirection = request('order_direction', 'desc');
        if (!in_array($orderDirection, ['asc', 'desc'])) {
            $orderDirection = 'created_at';
        }

        $posts = Post::query()->with('category')
            ->when(request('category'), function ($query) {
                $query->where('category_id', request('category'));
            })
            ->orderBy($orderColumn, $orderDirection)
            ->paginate(10);
        return PostResource::collection($posts);
    }

    public function store(StorePostRequest $request): Response
    {
        $post = Post::query()->create($request->validated());

        return Inertia::location(route('posts.index', $post));
    }

    public function destroy(Post $post): Response
    {
        $post->delete();

        return Inertia::render('Posts/Index')->with('message', 'Post deleted successfully');
    }
}
