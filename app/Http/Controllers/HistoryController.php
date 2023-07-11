<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\HistoryGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'req_yturl.*' => 'required|regex:/https\:\/\/www\.youtube\.com\/watch\?v\=.+/',
            'yturl.*' => 'required|regex:/https\:\/\/www\.youtube\.com\/watch\?v\=.+/',
        ]);

        $ytgroup_token = '';
        $is_exist = 1;
        while ($is_exist) {
            for ($i=0; $i<4; $i++) {
                $ytgroup_token .= Str::random(4);
                if ($i < 3) {
                    $ytgroup_token .= '-';
                }
            }

            $is_exist = HistoryGroup::where('group_token', $ytgroup_token)->first();
        }

        $array = $request->only(["req_yturl", "yturl"]);

        $history_group = new HistoryGroup;
        $history_group->group_token = $ytgroup_token;
        $history_group->save();

        $history_group_id = $history_group->id;
        $this_history_group = HistoryGroup::find($history_group_id);
        $urls_data = [];
        foreach ($array as $key => $value) {
            foreach ($value as $key2 => $value2) {
                array_push($urls_data, $value2);
            }
        }

        $history_data = [];
        foreach ($urls_data as $key => $value) {
            $exploded = explode('v=', $value);
            $video_id = end($exploded);
            array_push($history_data, [
                'yt_url' => $value,
                'video_id' => $video_id,
            ]);
        }

        $histories = $this_history_group->history()->createMany($history_data);

        return redirect()->route('player.show', ['group_token' => $ytgroup_token]);
    }

    /**
     * Display the specified resource.
     */
    public function show($group_token, History $history)
    {
        $history_group = HistoryGroup::where('group_token', $group_token)->first();

        if (!$history_group) {
            return view('player', ['ytdatas' => null]);
        }

        $urls_data = $history_group->history()->get();

        return view('player', ['ytdatas' => $urls_data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        //
    }
}
