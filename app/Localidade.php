<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imovel;

class Localidade extends Model
{
    protected $table = 'localidades';
	
	public function imovel()
    {
        return $this->hasMany('App\Imovel', 'localidade');
    }
	
	public function concelho()
    {
        return $this->belongsTo('App\Concelho');
    }
	
	public function codigos_postais()
    {
        return $this->hasMany('App\CodigoPostal', 'id_localidade')->orderBy('desig_postal', 'ASC');
    }
}
