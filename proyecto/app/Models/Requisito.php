<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'requisitos';

    protected $fillable = ['costo','contenido','detalles','organizaciones_regulatorias_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function anexos()
    {
        return $this->hasMany('App\Models\Anexo', 'requisito_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function organizacionesRegulatoria()
    {
        return $this->hasOne('App\Models\OrganizacionesRegulatoria', 'id', 'organizaciones_regulatorias_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preRequisitos()
    {
        return $this->hasMany('App\Models\PreRequisito', 'pre_requisito_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   /* public function preRequisitos()
    {
        return $this->hasMany('App\Models\PreRequisito', 'requisito_id', 'id');
    }*/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requisitoCumplidos()
    {
        return $this->hasMany('App\Models\RequisitoCumplido', 'requisito_id', 'id');
    }

}
