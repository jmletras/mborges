<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imovel;

class CodigoPostal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'codigos_postais';
	
	public function imovel()
    {
        return $this->hasMany('App\Imovel');
    }
}
