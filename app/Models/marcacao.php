<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marcacao extends Model
{
    use HasFactory;

	public function polo()
	{
		return $this->belongsTo(Polos::class, 'poloEntrega_id');
	}

	public function viatura()
	{
		return $this->belongsTo(Viaturas::class);
	}
}
