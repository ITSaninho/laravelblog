<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Portfolio;
use Illuminate\Contracts\Validation;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Portfolio::select()->orderBy('id', 'desc')->paginate(50);


        return view('admin.portfolio',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content = Portfolio::all();

        return view('admin.portfolio_create',compact('content'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Portfolio();

        if(Input::hasFile('img')) {
            $img = Input::file('img');
            $model->img = $img->getClientOriginalName();
            //mkdir('data/post/images/', 0755);
            $img->move('data/portfolio/', $img->getClientOriginalName());
        }else{
            $model->img = "default.jpg";
        }

        $model->title = $request->input('title');
        $model->text = $request->input('text');
        $model->keywords = $request->input('keywords');
        $model->description = $request->input('description');

        if($request->input('public') == 'on'){
            $model->public = 1;
        }else{
            $model->public = 0;
        }

        $model->save();

        return redirect()->back()->with('status','Публікація успішно додана');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contents = Portfolio::where('id','=',$id)->get();


        return view('admin.portfolio_show',compact('contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contents = Portfolio::where('id','=',$id)->get();

        return view('admin.portfolio_edit',compact('contents'));
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
        $model = Portfolio::find($id);

        $model->title = $request->input('title');
        $model->text = $request->input('text');

        if(Input::hasFile('img')) {
            $img = Input::file('img');
            $model->img = $img->getClientOriginalName();
            mkdir('data/portfolio/', 0755);
            $img->move('data/portfolio/', $img->getClientOriginalName());
        }


        if($request->input('public') == 'on'){
            $model->public = 1;
        }else{
            $model->public = 0;
        }


        $model->keywords = $request->input('keywords');
        $model->description = $request->input('description');

        $model->save();

        return redirect()->back()->with('status','Публікація успішно оновлена');
    }

    public function delete($id)
    {
        $model = Portfolio::find($id);
        $model->delete();

        return redirect()->back()->with('status','Публікація успішно видалена');
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
