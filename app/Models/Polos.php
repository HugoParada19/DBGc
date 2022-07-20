<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polos extends Model
{
    use HasFactory;
	public $timestamps = false;

	public function viaturas()
	{
		return $this->hasMany(Viaturas::class);
	}

	public function userinf()
	{
		return $this->hasMany(userinf::class);
	}

	public function marcacaos()
	{
		return $this->hasMany(marcacao::class);
	}
}
