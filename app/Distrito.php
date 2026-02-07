<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    public function concelhos()
    {
        return $this->hasMany('App\Concelho', 'cod_distrito')->orderBy('nome_concelho', 'ASC');
    }
}
