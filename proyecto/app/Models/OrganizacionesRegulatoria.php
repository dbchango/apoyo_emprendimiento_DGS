<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizacionesRegulatoria extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'organizaciones_regulatorias';

    protected $fillable = ['nombre','direccion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requisitos()
    {
        return $this->hasMany('App\Models\Requisito', 'organizaciones_regulatorias_id', 'id');
    }

}
