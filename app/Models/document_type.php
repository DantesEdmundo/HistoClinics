<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class document_type extends Model
{
    public function User():BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function patient(): BelongsTo
    {
        return $this->belongsTo(patients::class);
    }

    public function eps(): BelongsTo
    {
        return $this->belongsTo(eps::class);
    }
}
