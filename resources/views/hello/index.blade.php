<!--子ページ（カラーボックスの中身）-->

@extends('layouts.helloapp')

@section('title', 'まいたけページ')

@section('menubar')
    @parent
    まいたけまいたけページ    
@endsection

@section('content')
<p>ここが本文のコンテンツです</p>
<p>Controller value<br>'message' = {{$message}}</p>
<p>ViewComposer value<br>'view_message'={{$view_message}}</p>
@endsection

@section('footer')
<script>console.log("かくれまいたけ");</script>
<p>copylight 2026 いとうせんせい</p>
@endsection