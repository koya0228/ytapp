@extends('layout.main_layout')

@section('contents')
    @if (!$ytdatas)
        <p>no data</p>
    @else
        <div id="ytplayerOuter" class="ytplayer-outer">
            @foreach ($ytdatas as $ytdata)
                <div class="ytplayer-container">
                    <div class="ytplayer" name="{{ $ytdata->video_id }}" value="{{ $ytdata->id }}"></div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

@section('load-js')
    @vite(['resources/js/player.js'])
@endsection
