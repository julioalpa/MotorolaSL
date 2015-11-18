<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $table = 'Puesto';

    public function ConfigLinea()
    {
        return $this->belongsTo('App\ConfigLinea','ConfigLinea_id');
    }
}
