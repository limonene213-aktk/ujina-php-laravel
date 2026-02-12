<!--子ページ（カラーボックスの中身）-->

@extends('layouts.helloapp')

@section('title', 'まいたけページ')

@section('menubar')
    @parent
    まいたけまいたけページ
@endsection

@section('content')
<p>ここが本文のコンテンツです</p>

<p>これは、<middleware>google.com</middleware>へのリンクです。</p>
<p>これは、<middleware>hiroshima-aktk.com</middleware>へのリンクです。</p>

@endsection

@section('footer')
<script>console.log("かくれまいたけ");</script>
<p>copylight 2026 いとうせんせい</p>
@endsection