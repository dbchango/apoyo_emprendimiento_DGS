<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDePersona extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'tipo_de_persona';

    protected $fillable = ['nombre'];

}
