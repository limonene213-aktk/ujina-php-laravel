<!--子ページ（カラーボックスの中身）-->

@extends('layouts.helloapp')

@section('title', 'まいたけページ')

@section('menubar')
    @parent
    まいたけまいたけページ    
@endsection

@section('content')
    <h2>コンポーネント</h2>
    <x-message :id="$id ?? 1" />
    <p>※上がコンポーネントの表示です。</p>
@endsection

@section('footer')
<script>console.log("かくれまいたけ");</script>
<p>copylight 2026 いとうせんせい</p>
@endsection