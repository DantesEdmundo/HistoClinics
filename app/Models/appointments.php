<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class appointments extends Model
{
    protected $table = "appointment_table";



    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }
}
