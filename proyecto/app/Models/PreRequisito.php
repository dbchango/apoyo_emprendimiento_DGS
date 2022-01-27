<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreRequisito extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'pre_requisitos';

    protected $fillable = ['id', 'requisito_id','pre_requisito_id'];

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
    public function Prerequisito()
    {
        return $this->hasOne('App\Models\Requisito', 'id', 'pre_requisito_id');
    }

}
