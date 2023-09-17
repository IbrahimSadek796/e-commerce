<?php

namespace App\Http\Controllers\Visitor;

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
        return view('agint.layouts.shope', compact('posts'));
    }
    public function showMen()
    {
        //
        $array = post::orderBy('id', 'DESC')->where('kind' , '=' , 'men')->paginate(9);
        return view('agint.layouts.men', compact('array'));
    }


    public function showkids()
    {
        //
        $kids = post::orderBy('id', 'DESC')->where('kind' , '=' , 'kids')->paginate(9);
        return view('agint.layouts.kids', compact('kids'));
    }


    public function showwomen()
    {
        //
        $array = post::orderBy('id', 'DESC')->where('kind' , '=' , 'women')->paginate(9);
        return view('agint.layouts.women', compact('array'));
    }


    public function showAll()
    {
        //
        $array = post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->paginate(8);
        $men = post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','men')->paginate(8);
        $women = post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','women')->paginate(8);
        $kids = post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','kids')->paginate(8);
        $latest = post::orderBy('id', 'DESC')->paginate(8);
        return view('agint.main', compact('array','men','women','kids', 'latest'));
    }

    public function show(string $id)
    {
        //
        $post = post::findOrFail($id);
        
        if (!$post) {
            return redirect(route('agint.layouts.shop'))->with('error', 'Post not found!');
        }

        return view('agint.layouts.show')->with([
            'post' => $post,
        ]);
    }
}
