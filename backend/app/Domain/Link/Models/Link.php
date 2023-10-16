<?php

namespace App\Domain\Link\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model {
	protected $fillable = [
		'platform',
		'url',
		'position',
	];
}
