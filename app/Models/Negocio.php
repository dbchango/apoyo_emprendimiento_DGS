<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'negocios';

    protected $fillable = ['nombre','ubicacion','detalles','logo','user_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requisitoCumplidos()
    {
        return $this->hasMany('App\Models\RequisitoCumplido', 'negocio_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
}
