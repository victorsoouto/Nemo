<?php

namespace nemo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use nemo\Tanque;
use nemo\EspeciePeixe;

class Psicultura extends Model
{
	public $timestamps = false;
	protected $fillable = ['nome'];
 
    public function tanques(){
    	return $this->hasMany(Tanque::class);
    }

    public function especie_peixes(){
    	return $this->hasMany(EspeciePeixe::class);
    }
}
