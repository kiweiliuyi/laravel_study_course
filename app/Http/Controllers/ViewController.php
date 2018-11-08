<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     * 文章列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '文章列表';
        $article = Article::withTrashed()
            ->orderBy('id', 'desc')
            ->get();
        $assign = [
            'title' => $title,
            'article' => $article,
        ];
        // 用 php 的 compact 函数简化下 $assign 
        // $assign = compact('title', 'article');
        return view('article.index', $assign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '新增文章';
        $assign = compact('title');
        return view('article.create', $assign);
    }

    /**
     * Store a newly created resource in storage.
     *  新增文章
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        Article::create($data);
        return redirect('view/index');
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
     * 编辑文章
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = '编辑文章';
        $article = Article::find($id);
        $assign = compact('article', 'title');
        return view('article.edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *  修改文章
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        Article::where('id', $id)->update($data);
        return redirect('view/index');
    }

    /**
     * Remove the specified resource from storage.
     * 删除文章
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     * 恢复文章
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Article::where('id', $id)->restore();
        return redirect()->back();
    }
    /**
     * 彻底删除文章
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id)
    {
        Article::where('id', $id)->forceDelete();
        return redirect()->back();
    }
}
