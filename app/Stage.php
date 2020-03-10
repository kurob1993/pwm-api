<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function getLabel()
    {
        $label = '';
        switch ($this->id) {
            case 1:
                $label = '<span class="badge badge-secondary">'.$this->text.'...</span>';
                break;

            case 2:
                $label = '<span class="badge badge-warning">'.$this->text.'...</span>';
                break;

            case 3:
                $label = '<span class="badge badge-success">'.$this->text.'</span>';
                break;
        }

        return $label;
    }
}
