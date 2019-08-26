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

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
