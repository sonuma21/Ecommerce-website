<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
  protected $casts=[
    'images' => 'array'
  ];

  public function ShopProfile(): BelongsTo
  {
      return $this->belongsTo(ShopProfile::class);
  }
}
