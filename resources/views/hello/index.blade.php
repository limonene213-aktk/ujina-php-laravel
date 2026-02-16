<!--子ページ（カラーボックスの中身）-->

@extends('layouts.helloapp')

@section('title', 'まいたけページ')

@section('menubar')
    @parent
    まいたけまいたけページ
@endsection

@section('content')
<p>{{$msg}}</p>

@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/hello" method="post">
    @csrf
    <div>
        <labey style="display:inline-block; width:75px;"
        for="name">name:</label>
        <input type="text" name = "name" vale = "{{old('name')}}">
    </div>

    <div>
        <labey style="display:inline-block; width:75px;"
        for="name">mail:</label>
        <input type="text" name = "mail" value = "{{old('mail')}}">
    </div>

    <div>
        <labey style="display:inline-block; width:75px;"
        for="name">age:</label>
        <input type="text" name = "age" value = "{{old('age')}}">
        <input type="submit" value="send">
    </div>
</form>

@endsection

@section('footer')
<script>console.log("かくれまいたけ");</script>
<p>copylight 2026 いとうせんせい</p>
@endsection