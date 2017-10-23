<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Message::select()->orderBy('id', 'desc')->paginate(50);


        return view('admin.messages',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::all();

        return view('admin.messages_create', compact('users'));
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


        /*
        $last_message = Message::where('user_id','=',$request->input('user_id'))->andWhere('user_id','=',$request->input('whom_id'))
            ->orWhere('whom_id','=',$request->input('user_id'))->andWhere('user_id','=',$request->input('whom_id'))->get();

        foreach($last_message as $message){
            return $message;
        }
        */

        /*
        if($request->input('user_id') > $request->input('whom_id')){
            $model->user_id = $request->input('user_id');
            $model->whom_id = $request->input('whom_id');
        }else{
            $model->user_id = $request->input('whom_id');
            $model->whom_id = $request->input('user_id');
        }
        */
        $results1 = Message::where('user_id','=',$request->input('user_id'))
            ->where('whom_id','=',$request->input('whom_id'))
            ->where('last_message','=',1)->get();
        $results2 = Message::where('user_id','=',$request->input('whom_id'))
            ->where('whom_id','=',$request->input('user_id'))
            ->where('last_message','=',1)->get();
        foreach($results1 as $result1){
            if($result1->id > 0){
                $result1->last_message = 0;
                $result1->save();
            }
        }
        foreach($results2 as $result2){
            if($result2->id > 0){
                $result2->last_message = 0;
                $result2->save();
            }
        }



        $model->last_message = 1;
        $model->user_id = $request->input('user_id');
        $model->whom_id = $request->input('whom_id');

        $model->text = $request->input('text');
        if($request->input('read_it') == 'on'){
            $model->read_it = 1;
        }else{
            $model->read_it = 0;
        }

        $model->save();

        return redirect()->back()->with('status','Повідомлення успішно додано');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contents = Message::where('id','=',$id)->get();


        return view('admin.messages_show',compact('contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $users = User::all();


        $contents = Message::where('id','=',$id)->get();


        return view('admin.messages_edit',compact('contents','users'));
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
        $model = Message::find($id);

        $model->user_id = $request->input('user_id');
        $model->whom_id = $request->input('whom_id');
        $model->text = $request->input('text');
        if($request->input('read_it') == 'on'){
            $model->read_it = 1;
        }else{
            $model->read_it = 0;
        }

        $model->save();

        return redirect()->back()->with('status','Повідомлено успішно оновлено');
    }

    public function delete($id)
    {
        $model = Message::find($id);
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
