@extends('layout.main_layout')

@section('contents')
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach

    <form action={{ route('player.store') }} method="post" id="urlPostForm">
        @csrf
        <input type="text" name="req_yturl[]">
        <input type="text" name="req_yturl[]">

        <button id="addUrlBox" type="button">追加</button>

        <button type="submit">go</button>
    </form>
@endsection

@section('load-js')
    @vite(['resources/js/form.js'])
@endsection
