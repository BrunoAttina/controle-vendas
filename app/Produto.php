<?php
namespace App;



use Illuminate\Database\Eloquent\Model;

/**
 * 
 */
class Produto extends Model
{
	//public $timestamps = false;
   
    public function venda()
	{
		return $this->belongsTo(Venda::class);
	}

}