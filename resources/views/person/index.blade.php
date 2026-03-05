<!--子ページ（カラーボックスの中身）-->

@extends('layouts.helloapp')

@section('title', '推しIndex')

@section('menubar')
    @parent
    まいたけまいたけページ
@endsection

@section('content')
<table>
    <tr><th>Name</th>
        <th>Mail</th>
        <th>Age</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>({$item->name})</td>
        <td>({$item->mail})</td>
        <td>({$item->age})</td>
    </tr>
    @eneforeach
</table>
@endsection

@section('footer')
<script>console.log("hello まいたけworld");</script>
<p>copylight 2026 いとうせんせい</p>
@endsection