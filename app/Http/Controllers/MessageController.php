<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Category;
use App\Tags;
use App\Post;
use App\Message;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $model = new Message();


        $results1 = Message::where('user_id','=',Auth::user()->id)
            ->where('whom_id','=',$request->input('whom_id'))
            ->where('last_message','=',1)->get();
        $results2 = Message::where('user_id','=',$request->input('whom_id'))
            ->where('whom_id','=',Auth::user()->id)
            ->where('last_message','=',1)->get();
        foreach($results1 as $result1){
            if($result1->last_message > 0){
                $result1->last_message = 0;
                $result1->save();
            }
        }
        foreach($results2 as $result2){
            if($result2->last_message > 0){
                $result2->last_message = 0;
                $result2->save();
            }
        }



        $model->last_message = 1;
        $model->user_id = Auth::user()->id;
        $model->whom_id = $request->input('whom_id');

        $model->text = $request->input('text');
        $model->read_it = 0;

        $model->save();

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //$contents = User::where('id','=',Auth::user()->id)->get();

        $contents = Message::where('last_message','=',1)
            ->orderBy('created_at', 'desc')
            ->get();

        $users = User::where('id','!=',Auth::user()->id)
            //->where('id','=',$user->user_id)
            //->orWhere('id','=',$user->whom_id)
            ->get();

        /*
        foreach($contents as $user){
            $users = User::where('id','!=',Auth::user()->id)
                //->where('id','=',$user->user_id)
                //->orWhere('id','=',$user->whom_id)
                ->get();
        }
        */

        $category = Category::all();

        $populars = Post::where('public', '=', 1)->orderBy('views', 'desc')->limit(5)->get();

        $more_likes = Post::where('public', '=', 1)->orderBy('likes', 'desc')->limit(5)->get();

        $tags = Tags::select()->limit(10)->get();


        return view('site.message_list',compact('contents','category','populars','more_likes','tags','users'));
    }


    public function showDialog($dialog)
    {
        //$contents = User::where('id','=',Auth::user()->id)->get();

        $contents = Message::where('user_id','=',Auth::user()->id)
            ->orWhere('whom_id','=',Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();


        $category = Category::all();

        $populars = Post::where('public', '=', 1)->orderBy('views', 'desc')->limit(5)->get();

        $more_likes = Post::where('public', '=', 1)->orderBy('likes', 'desc')->limit(5)->get();

        $tags = Tags::select()->limit(10)->get();


        return view('site.message_dialog',compact('contents','category','populars','more_likes','tags','dialog'));
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
