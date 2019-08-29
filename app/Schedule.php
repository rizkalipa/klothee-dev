<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps = false;

    protected $dates = ['date_time'];

    protected $fillable = [
        'place',
        'meeting_purpose',
        'note'
    ];

    public function dateSchedule($value)
    {
        $value = \App\Schedule::get()->first(function($date) use($value) { return ($date->date_time->day == $value) && ($date->author_response == 'Accept'); });
        return $value;
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
