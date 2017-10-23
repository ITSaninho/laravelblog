<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Category;
use App\Tags;
use App\Post;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = User::where('public',1)->where('id','!=',Auth::user()->id)->orderBy('id', 'desc')->paginate(50);
        $category = Category::all();

        $populars = Post::where('public', '=', 1)->orderBy('views', 'desc')->limit(5)->get();

        $more_likes = Post::where('public', '=', 1)->orderBy('likes', 'desc')->limit(5)->get();

        $tags = Tags::select()->limit(10)->get();


        return view('site.users',compact('contents','category','populars','more_likes','tags'));
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
        $contents = User::where('id','=',$id)->get();
        $category = Category::all();

        $populars = Post::where('public', '=', 1)->orderBy('views', 'desc')->limit(5)->get();

        $more_likes = Post::where('public', '=', 1)->orderBy('likes', 'desc')->limit(5)->get();

        $tags = Tags::select()->limit(10)->get();


        return view('site.profile',compact('contents','category','populars','more_likes','tags','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Auth::user()->id == $id){
            $contents = User::where('id','=',$id)->get();
            $category = Category::all();

            $populars = Post::where('public', '=', 1)->orderBy('views', 'desc')->limit(5)->get();

            $more_likes = Post::where('public', '=', 1)->orderBy('likes', 'desc')->limit(5)->get();

            $tags = Tags::select()->limit(10)->get();


            return view('site.profile_edit',compact('contents','category','populars','more_likes','tags'));
        }else{
            return redirect()->back();
        }
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
        $model = User::find($id);

        if(Input::hasFile('avatar')) {
            $avatar = Input::file('avatar');
            $model->avatar = $avatar->getClientOriginalName();
            //mkdir("data/user/".Auth::user()->email, 0755);
            //mkdir("data/user/".Auth::user()->email."/images", 0755);
            $avatar->move('data/user/'.Auth::user()->email.'/images', $model->avatar);
        }

        $model->name = $request->name;
        if(!empty($request->password)){
            $model->password = bcrypt($request->password);
        }



        $model->save();

        return redirect()->back();
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
