<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitoCumplido extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'requisito_cumplidos';

    protected $fillable = ['requisito_id','negocio_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function requisito()
    {
        return $this->hasOne('App\Models\Requisito', 'id', 'requisito_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function negocio()
    {
        return $this->hasOne('App\Models\Negocio', 'id', 'negocio_id');
    }

}
