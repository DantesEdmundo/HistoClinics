<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class medical_order extends Model
{
    //
    protected $table = "medical_order_table";


    public function order_types(): HasMany
    {
        return $this->hasMany(order_type::class);
    }


    public function medical_record(): BelongsTo
    {
        return $this->belongsTo(medical_records::class);
    }
}
