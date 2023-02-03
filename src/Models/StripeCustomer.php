<?php

namespace Creatydev\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class StripeCustomer extends Model
{
    protected $table = 'stripe_customer';
    protected $guarded = [];
    protected $fillable = ['model_id', 'model_type', 'customer_id'];
    protected $dates = [
        //
    ];

    public function model()
    {
        return $this->morphTo();
    }
}
