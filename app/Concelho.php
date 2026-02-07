<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concelho extends Model
{
    public function distrito()
    {
        return $this->belongsTo('App\Distrito');
    }

	public function localidades()
    {
        return $this->hasMany('App\Localidade', 'id_concelho')->orderBy('nome_localidade', 'ASC');
    }
}
