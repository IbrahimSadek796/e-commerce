<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {
        //


        $posts = post::orderBy('id', 'DESC')->paginate(9);
        return view('user.layouts.shope', compact('posts'));
    }
    public function showMen()
    {
        //
        $array = post::orderBy('id', 'DESC')->where('kind' , '=' , 'men')->paginate(9);
        return view('user.layouts.men', compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showkids()
    {
        //
        $kids = post::orderBy('id', 'DESC')->where('kind' , '=' , 'kids')->paginate(9);
        return view('user.layouts.kids', compact('kids'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showwomen()
    {
        //
        $array = post::orderBy('id', 'DESC')->where('kind' , '=' , 'women')->paginate(9);
        return view('user.layouts.women', compact('array'));
    }

    /**
     * Display the specified resource.
     */
    public function showAll()
    {
        //
        $array = post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->paginate(8);
        $men = post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','men')->paginate(8);
        $women = post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','women')->paginate(8);
        $kids = post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','kids')->paginate(8);
        $latest = post::orderBy('id', 'DESC')->paginate(8);
        return view('user.main', compact('array','men','women','kids', 'latest'));
    }

    public function show(string $id)
    {
        //
        $post = post::findOrFail($id);
        //return view('user.layouts.show', compact('post'));
        if (!$post) {
            return redirect(route('user.layouts.shop'))->with('error', 'Post not found!');
        }

        return view('user.layouts.show')->with([
            'post' => $post,
        ]);
    }
}
