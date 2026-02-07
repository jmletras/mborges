<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Foto;
use App\CodigoPostal;
use App\Localidade;

class Imovel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'imoveis';
	
	public function fotos()
    {
        return $this->hasMany('App\Foto', 'id_imovel');
    }
	
	public function cod_postal()
    {
        return $this->belongsTo('App\CodigoPostal', 'codigo_postal');
    }
	
	public function ref_localidade()
    {
        return $this->belongsTo('App\Localidade', 'localidade');
    }
}
