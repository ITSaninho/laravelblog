<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\User;
use App\Tags;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Category::select()->paginate(50);


        return view('admin.category',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Category();

        $model->name = $request->input('name');
        $model->alias = $request->input('alias');
        $model->keywords = $request->input('keywords');
        $model->description = $request->input('description');
        $model->parent_id = 0;

        $model->save();

        return redirect()->back()->with('status','Категорія успішно додана');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contents = Category::where('id','=',$id)->get();


        return view('admin.category_show',compact('contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contents = Category::where('id','=',$id)->get();


        return view('admin.category_edit',compact('contents'));
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
        $model = Category::find($id);

        $model->name = $request->input('name');
        $model->alias = $request->input('alias');
        $model->keywords = $request->input('keywords');
        $model->description = $request->input('description');
        $model->parent_id = 0;

        $model->save();

        return redirect()->back()->with('status','Категорія успішно оновлена');
    }

    public function delete($id)
    {
        $model = Category::find($id);
        $model->delete();

        return redirect()->back()->with('status','Категорія успішно видалена');
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
