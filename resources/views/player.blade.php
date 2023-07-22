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
                <button id="allBack">
                    <x-svg svg=back></x-svg>
                </button>
                <button id="allPlayStop">
                    <x-svg svg=play></x-svg>
                </button>
                <button id="allForward">
                    <x-svg svg=forward></x-svg>
                </button>
            </div>
        </div>
        <div class="ytplayers-container">
            <div id="ytplayerOuter" class="ytplayer-outer">

                @foreach ($ytdatas as $ytdata)
                    <div class="ytplayer-container shadow" value="{{ $ytdata->id }}">
                        <div class="subplayer-header">
                            <button class="player-switcher">
                                <x-svg svg=switch></x-svg>
                            </button>
                        </div>
                        <div class="video-outer">
                            <div class="ytplayer" name="{{ $ytdata->video_id }}" value="{{ $ytdata->id }}"></div>
                        </div>
                        <div class="ytplayer-controller">
                            <div class="volume-controller">
                            </div>
                            <div class="play-controller">
                                <button class="back">
                                    <x-svg svg=back></x-svg>
                                </button>
                                <button class="playStop">
                                    <x-svg svg=play></x-svg>
                                </button>
                                <button class="forward">
                                    <x-svg svg=forward></x-svg>
                                </button>
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
