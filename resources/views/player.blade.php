@extends('layout.main_layout')

@section('contents')
    @if (!$ytdatas)
        <p>no data</p>
    @else
        <div id="allController">
            <button id="allBack"><</button>
            <button id="allPlayStop">O</button>
            <button id="allForward">></button>
        </div>
        <div id="ytplayerOuter" class="ytplayer-outer">
            @foreach ($ytdatas as $ytdata)
                <div class="ytplayer-container" value="{{ $ytdata->id }}">
                    <div class="video-outer">
                        <div class="ytplayer" name="{{ $ytdata->video_id }}" value="{{ $ytdata->id }}"></div>
                    </div>
                    <div class="ytplayer-controller">
                        <div class="volume-controller">

                        </div>
                        <div class="play-controller">
                            <button class="back"><</button>
                            <button class="playStop">O</button>
                            <button class="forward">></button>
                        </div>
                        <div class="yt-link">

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

@section('load-js')
    @vite(['resources/js/player.js'])
@endsection
