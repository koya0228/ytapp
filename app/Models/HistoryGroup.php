<?php

namespace App\Models;

use App\Models\History;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_token',
    ];

    public function history() {
        return $this->hasMany(History::class);
    }
}
