<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tags;
use App\Http\Requests;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category)
    {
        $posts = Post::where('category_id', '=', $category)->where('public','=',1)->orderBy('id', 'desc')->paginate(5);

        $category = Category::all();

        $populars = Post::where('public', '=', 1)->orderBy('views', 'desc')->limit(5)->get();

        $more_likes = Post::where('public', '=', 1)->orderBy('likes', 'desc')->limit(5)->get();

        $tags = Tags::select()->limit(10)->get();

        return view('site.index',compact('posts','category','populars','more_likes','tags'));
    }

    public function video($category)
    {
        $posts = Post::where('category_id', '=', $category)->where('video','=',1)->where('public','=',1)->orderBy('id', 'desc')->paginate(5);

        $category = Category::all();

        $populars = Post::where('public', '=', 1)->orderBy('views', 'desc')->limit(5)->get();

        $more_likes = Post::where('public', '=', 1)->orderBy('likes', 'desc')->limit(5)->get();

        $tags = Tags::select()->limit(10)->get();

        return view('site.index',compact('posts','category','populars','more_likes','tags'));
    }

    public function script($category)
    {
        $posts = Post::where('category_id', '=', $category)->where('script','=',1)->where('public','=',1)->orderBy('id', 'desc')->paginate(5);

        $category = Category::all();

        $populars = Post::where('public', '=', 1)->orderBy('views', 'desc')->limit(5)->get();

        $more_likes = Post::where('public', '=', 1)->orderBy('likes', 'desc')->limit(5)->get();

        $tags = Tags::select()->limit(10)->get();

        return view('site.index',compact('posts','category','populars','more_likes','tags'));
    }

    public function snipet($category)
    {
        $posts = Post::where('category_id', '=', $category)->where('snipet','=',1)->where('public','=',1)->orderBy('id', 'desc')->paginate(5);

        $category = Category::all();

        $populars = Post::where('public', '=', 1)->orderBy('views', 'desc')->limit(5)->get();

        $more_likes = Post::where('public', '=', 1)->orderBy('likes', 'desc')->limit(5)->get();

        $tags = Tags::select()->limit(10)->get();

        return view('site.index',compact('posts','category','populars','more_likes','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
