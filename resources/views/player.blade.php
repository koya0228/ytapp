@extends('layout.main_layout')

@section('load-css')
    @vite(['resources/css/player.css'])
@endsection

@section('contents')
    @if (!$ytdatas)
        <p>no data</p>
    @else
        <div class="toolbar shadow">
            <div id="allController">
                <button id="allBack"><</button>
                <button id="allPlayStop">O</button>
                <button id="allForward">></button>
            </div>
        </div>
        <div class="ytplayers-container">
            <div id="ytplayerOuter" class="ytplayer-outer">

                @foreach ($ytdatas as $ytdata)
                    <div class="ytplayer-container shadow" value="{{ $ytdata->id }}">
                        <button class="player-switcher">switch</button>
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
        </div>
    @endif
@endsection

@section('load-js')
    @vite(['resources/js/player.js'])
@endsection
