<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigLinea extends Model
{
    protected $table = 'ConfigLinea';

    public function Puesto()
    {
        return $this->hasMany('App\Puesto');
    }
}
