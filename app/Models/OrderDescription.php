<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDescription extends Model
{

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
      public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
