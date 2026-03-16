<!--子ページ（カラーボックスの中身）-->

@extends('layouts.helloapp')

@section('title', '推しIndex')

@section('menubar')
    @parent
    検索
@endsection

@section('content')
<form action="/person/find" method="post">
    @csrf
    <input type="text" name="input" value ="{{$input}}">
    <input type='submit' value="find">
    @foreach($items as $item)
</form>
@if(isset($item))
<table>
    <tr><th>Data</th></tr>
    <tr>
        <td>{{$item->getData()}}</td>
    </tr>
</table>
@endif
@endsection

@section('footer')
<script>console.log("hello まいたけworld");</script>
<p>copylight 2026 いとうせんせい</p>
@endsection