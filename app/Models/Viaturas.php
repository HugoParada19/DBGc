<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaturas extends Model
{
    use HasFactory;

	public function polo()
	{
		return $this->belongsTo(Polos::class, 'polos_id');
	}

	public function categoria()
	{
		return $this->belongsTo(categorias_cartas::class, 'catCarta_id');
	}

	public function marcacaos()
	{
		return $this->belongsTo(marcacao::class);
	}
}
