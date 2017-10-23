<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Tags;
use App\Comment;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_alias)
    {
        $posts = Post::all()->where('public', '=', 1)->where('id','=',$post_alias);
        $category = Category::all();

        $populars = Post::where('public', '=', 1)->orderBy('views', 'desc')->limit(5)->get();

        $more_likes = Post::where('public', '=', 1)->orderBy('likes', 'desc')->limit(5)->get();

        $tags = Tags::select()->limit(10)->get();

        $comments = Comment::all()->where('post_id',$post_alias);
        $tree = $this->makeArray($comments);

        return view('site.post',compact('posts','category','populars','more_likes','tags','comments','tree'));
    }


    public function addComment(Request $request){

        //dd($request);
        //Comments:create($request);
        $model = new Comment();
        if(Auth::User()){
            $model->user_id = $request->input('user_id');
            $model->login = '0';
        }else{
            $model->user_id = 1;
            $model->login = $request->input('login');
        }
        $model->post_id = $request->input('post_id');
        $model->parent_id = $request->input('parent_id');
        $model->text = $request->input('text');
        //$model->email = $request->input('email');
        $model->save();
        //$model->author = $request->input('author');

        return redirect()->back();

    }

    private function makeArray($comments){
        $childs=[];

        foreach($comments as $comment){
            $childs[$comment->parent_id][]=$comment;
        }

        foreach($comments as $comment){
            if(isset($childs[$comment->id]))
                $comment->childs=$childs[$comment->id];

        }
        if(count($childs)>0){
            $tree=$childs[0];
        }
        else {
            $tree=[];
        }
        return $tree;
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
