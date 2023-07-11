<?php

namespace App\Models;

use App\Models\HistoryGroup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'yt_url', 'video_id',
    ];

    public function history_group() {
        return $this->belongsTo(HistoryGroup::class);
    }
}
