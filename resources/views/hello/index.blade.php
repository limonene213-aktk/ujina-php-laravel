<!--子ページ（カラーボックスの中身）-->

@extends('layouts.helloapp')

@section('title', 'まいたけページ')

@section('menubar')
    @parent
    まいたけまいたけページ
@endsection

@section('content')
<p>ここが本文のコンテンツです</p>
<table>
    @foreach($data as $item)
    <tr>
        <th style="border: solid 1px #aaa; padding:5px 10px;">
            {{$item['name']}}
        </th>
        <th style="border: solid 1px #aaa; padding:5px 10px;">
            {{$item['mail']}}
        </th>
    </tr>
    @endforeach
</table>
@endsection

@section('footer')
<script>console.log("かくれまいたけ");</script>
<p>copylight 2026 いとうせんせい</p>
@endsection