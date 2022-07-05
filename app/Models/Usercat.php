<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usercat extends Model
{
    use HasFactory;
	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo(userinf::class, 'id');
	}

	public function categoria()
	{
		return $this->belongsTo(categorias_cartas::class, 'id');
	}

	public function categorias()
	{
		return $this->hasManyThrough(categorias_cartas::class, userinf::class);
	}
}
