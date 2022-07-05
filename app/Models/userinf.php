<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\User;

class userinf extends Model
{
    use HasFactory;
	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo(User::class, 'id');
	}

	public function polo()
	{
		return $this->belongsTo(Polos::class, 'id');
	}

	public function Usercats()
	{
		return $this->hasMany(Usercat::class, 'userinf_id');
	}
}
