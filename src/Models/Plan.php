<?php

namespace Creatydev\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plan';
    protected $guarded = [];
    protected $fillable = ['name', 'description', 'price', 'currency', 'duration', 'metadata'];
    protected $casts = [
        'metadata' => 'object',
    ];

	public function Features()
	{
		return $this->hasMany(config('plans.models.feature'), 'fk_plan_id', 'id');
	}
}
