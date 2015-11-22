<?php

namespace MotorolaSL;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $table = 'Puesto';

    public function ConfigLinea()
    {
        return $this->belongsTo('MotorolaSL\ConfigLinea','ConfigLinea_id');
    }
}
