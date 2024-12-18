<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class medical_records extends Model
{
    //
    protected $table = "medical_records_table";



    public function medical_orders(): HasMany
    {
        return $this->hasMany(medical_order::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(patients::class);
    }
}
