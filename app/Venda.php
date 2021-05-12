<?php
namespace App;



use Illuminate\Database\Eloquent\Model;

/**
 * 
 */
class Venda extends Model
{
	//public $timestamps = false;

	public function cliente()
	{
		return $this->belongsTo(Cliente::class);
	}

	public function produtos()
	{
		return $this->hasMany(Produto::class);
	}

    
}