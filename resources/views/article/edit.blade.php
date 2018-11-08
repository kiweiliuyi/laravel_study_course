@extends('layouts.home')

@section('title', $title)

@section('content')
<form action="{{ url('view/update', $article->id) }}" method="post">
    {{ csrf_field() }}
    标题：
    <input type="text" name="title" value="{{ $article->title }}"> <br>
    内容：
    <input type="text" name="content" value="{{ $article->content }}"> <br>
    <button type="submit">提交</button>
</form>
@endsection