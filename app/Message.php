<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'number', 'text', 'user_id', 'stage_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function stage()
    {
        return $this->belongsTo('App\Stage');
    }

    public function priority()
    {
        return $this->belongsTo('App\Priority', 'user_id');
    }
}
