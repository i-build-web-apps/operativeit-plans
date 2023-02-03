<?php

namespace Creatydev\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class PlanSubscriptionUsage extends Model
{
    protected $table = 'plan_subscription_usage';
    protected $guarded = [];
    protected $fillable = ['fk_subscription_id', 'code', 'used'];

    public function subscription()
    {
        return $this->belongsTo(config('plans.models.subscription'), 'fk_subscription_id');
    }

    public function scopeCode($query, string $code)
    {
        return $query->where('code', $code);
    }
}
