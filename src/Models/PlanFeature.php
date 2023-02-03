<?php

namespace Creatydev\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    protected $table = 'plan_feature';
    protected $guarded = [];
    protected $fillable = ['fk_plan_id', 'name', 'code', 'description', 'type', 'limit', 'metadata'];
    protected $casts = [
        'metadata' => 'object',
    ];

    public function plan()
    {
        return $this->belongsTo(config('plans.models.plan'), 'fk_plan_id');
    }

    public function scopeCode($query, string $code)
    {
        return $query->where('code', $code);
    }

    public function scopeLimited($query)
    {
        return $query->where('type', 'limit');
    }

    public function scopeFeature($query)
    {
        return $query->where('type', 'feature');
    }

    public function isUnlimited()
    {
        return (bool) ($this->type == 'limit' && $this->limit < 0);
    }
}
