<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Imovel;

class Foto extends Model
{
	protected $table = 'fotos';
	
    public function imovel()
    {
        return $this->belongsTo('App\Imovel');
    }
}
