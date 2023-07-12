@extends('layout.main_layout')

@section('load-css')
    @vite(['resources/css/form.css'])
@endsection

@section('contents')
    <div class="form-outer">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <div class="form-container">
            <form action={{ route('player.store') }} method="post" id="urlPostForm">
                @csrf
                <label>
                    <p>YouTube url 1</p>
                    <input type="text" name="req_yturl[]">
                </label>
                <label>
                    <p>YouTube url 2</p>
                    <input type="text" name="req_yturl[]"></label>
                <button id="addUrlBox" type="button" class="btn">Add URL</button>
                <button type="submit" class="btn">GO</button>
            </form>
        </div>
    </div>
@endsection

@section('load-js')
    @vite(['resources/js/form.js'])
@endsection
