<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class order_type extends Model
{
    //
    protected $table = "order_type";
    public function medical_order(): BelongsTo
    {
        return $this->belongsTo(medical_order::class);
    }
}
