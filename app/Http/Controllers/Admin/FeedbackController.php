<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedback;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Feedback::select()->orderBy('id', 'desc')->paginate(50);


        return view('admin.feedback',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feedback_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Feedback();

        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->subject = $request->input('subject');
        $model->text = $request->input('text');

        $model->save();

        return redirect()->back()->with('status','Відгук успішно доданий');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contents = Feedback::where('id','=',$id)->get();


        return view('admin.feedback_show',compact('contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contents = Feedback::where('id','=',$id)->get();


        return view('admin.feedback_edit',compact('contents'));
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
        $model = Feedback::find($id);

        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->subject = $request->input('subject');
        $model->text = $request->input('text');

        $model->save();

        return redirect()->back()->with('status','Відгук успішно оновлений');
    }

    public function delete($id)
    {
        $model = Feedback::find($id);
        $model->delete();

        return redirect()->back()->with('status','Відгук успішно видалений');
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
