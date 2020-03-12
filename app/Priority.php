<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function messages()
    {
        return $this->hasMany('App\Message', 'user_id');
    }

    public function getLabel()
    {
        $label = '';
        switch ($this->priority) {
            case 0:
                $label = '<span class="badge badge-secondary">Basic</span>';
                break;

            case 1:
                $label = '<span class="badge badge-primary">Priority</span>';
                break;
        }

        return $label;
    }

}
