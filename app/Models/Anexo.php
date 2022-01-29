<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'anexos';

    protected $fillable = ['contenido','requisito_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function requisito()
    {
        return $this->hasOne('App\Models\Requisito', 'id', 'requisito_id');
    }
    
}
