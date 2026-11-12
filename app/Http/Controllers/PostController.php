<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = (int) $request->input('per_page', 10);

        if (!in_array($perPage, [5, 10, 25])) {
            $perPage = 10;
        }

        $posts = Post::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->withQueryString();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();

        return view('post.trash', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        $post->restore();

        return redirect()->route('posts.trash')
            ->with('success', 'Post berhasil dipulihkan.');
    }

    public function forceDelete($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        $post->forceDelete();

        return redirect()->route('posts.trash')
            ->with('success', 'Post berhasil dihapus permanen.');
    }
}
