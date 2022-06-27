<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userCats extends Model
{
    use HasFactory;
	private $timestamps = false;

	public function userinf()
	{
		return $this->belongsTo(userinf::class);
	}

	public function categorias()
	{
		return $this->belongsTo(categorias_cartas::class);
	}
}
