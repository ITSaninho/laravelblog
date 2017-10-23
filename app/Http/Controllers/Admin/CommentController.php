<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use App\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Comment::select()->orderBy('id', 'desc')->paginate(50);


        return view('admin.comments',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comments = Comment::all();
        $users = User::all();
        $posts = Post::all();

        return view('admin.comments_create',compact('comments','users','posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Comment();

        $model->login = $request->input('login');
        $model->parent_id = $request->input('parent_id');
        $model->text = $request->input('text');
        $model->likes = $request->input('likes');
        $model->deslikes = $request->input('deslikes');
        $model->post_id = $request->input('post_id');
        $model->user_id = $request->input('user_id');

        $model->save();

        return redirect()->back()->with('status','Коментарі успішно додана');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contents = Comment::where('id','=',$id)->get();


        return view('admin.comments_show',compact('contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contents = Comment::where('id','=',$id)->get();

        foreach($contents as $parent_comment){
            $parents_comment = Comment::where('id','=',$parent_comment->id)->get();
        }


        $comments = Comment::all();
        $users = User::all();
        $posts = Post::all();


        return view('admin.comments_edit',compact('contents','users','posts','parents_comment','comments'));
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
        $model = Comment::find($id);

        $model->login = $request->input('login');
        $model->parent_id = $request->input('parent_id');
        $model->text = $request->input('text');
        $model->likes = $request->input('likes');
        $model->deslikes = $request->input('deslikes');
        $model->post_id = $request->input('post_id');
        $model->user_id = $request->input('user_id');

        $model->save();

        return redirect()->back()->with('status','Коментарь успішно оновлена');
    }

    public function delete($id)
    {
        $model = Comment::find($id);
        $model->delete();

        return redirect()->back()->with('status','Коментарь успішно видалена');
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
