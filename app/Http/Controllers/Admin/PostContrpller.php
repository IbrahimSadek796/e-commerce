<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;

class PostContrpller extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        $posts = post::orderBy('id', 'DESC')->paginate(9);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'number_of_product' => 'numeric',
            'taxs' => 'numeric',
            'image' => 'image|max:6000',
            'quality' => 'numeric',
            'kind' => 'required|string',
        ]);

        // $path = $request->file('image')->store('Posts');
        // dd($path);
        $validated['image'] = $request->file('image')->store('Posts');


         post::create($validated);



        return redirect(route('posts.index'))->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = post::find($id);

        if (!$post) {
            return redirect(route('admin.posts.index'))->with('error', 'Post not found!');
        }

        return view('admin.posts.edit')->with([
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|unique:posts,title,' . $id . '|max:100',
            'description' => 'nullable|string',

            'price' => 'numeric',
            'number_of_product' => 'numeric',
            'taxs' => 'numeric',
            'image' => 'image|max:6000',
            'quality' => 'numeric',
            'kind' => 'required|string',
        ]);

        $post = post::find($id);

        if (!$post) {
            return redirect(route('admin.posts.index'))->with('error', 'Post not found!');
        }

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('Posts.images');
            \Storage::delete($post->image);
        }

        $post->update($validated);



        return redirect(route('posts.index'))->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = post::find($id);

        \Storage::delete($post->image);
        $post?->delete();

        return redirect(route('posts.index'))->with('success', 'Post deleted successfully');
    }
}
