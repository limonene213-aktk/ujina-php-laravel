<!--子ページ（カラーボックスの中身）-->

@extends('layouts.helloapp')

@section('title', 'まいたけページ')

@section('menubar')
    @parent
    まいたけまいたけページ
@endsection

@section('content')
<p>{{$msg}}</p>

<form action="/hello" method="post">
    @csrf
    <div>
        <labey style="display:inline-block; width:75px;"
        for="name">name:</label>
        <input type="text" name = "name">
    </div>

    <div>
        <labey style="display:inline-block; width:75px;"
        for="name">mail:</label>
        <input type="text" name = "name">
    </div>

    <div>
        <labey style="display:inline-block; width:75px;"
        for="name">age:</label>
        <input type="text" name = "name">
        <input type="submit" value="send">
    </div>
</form>

@endsection

@section('footer')
<script>console.log("かくれまいたけ");</script>
<p>copylight 2026 いとうせんせい</p>
@endsection