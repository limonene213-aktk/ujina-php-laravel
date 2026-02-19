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
        <input type="text" name = "name" vale = "{{old('name')}}">
        @if ($errors->has('name'))
        <p style="font-size:10px; margin-top:0px;">
            ERROR:{{$errors->first('name')}}
        </p>
        @endif
    </div>

    <div>
        <labey style="display:inline-block; width:75px;"
        for="name">mail:</label>
        <input type="text" name = "mail" value = "{{old('mail')}}">
        @if ($errors->has('mail'))
        <p style="font-size:10px; margin-top:0px;">
            ERROR:{{$errors->first('mail')}}
        </p>
        @endif
    </div>

    <div>
        <labey style="display:inline-block; width:75px;"
        for="name">age:</label>
        <input type="text" name = "age" value = "{{old('age')}}">
        @if ($errors->has('age'))
        <p style="font-size:10px; margin-top:0px;">
            ERROR:{{$errors->first('age')}}
        </p>
        @endif
        <input type="submit" value="send">
    </div>
</form>

@endsection

@section('footer')
<script>console.log("かくれまいたけ");</script>
<p>copylight 2026 いとうせんせい</p>
@endsection