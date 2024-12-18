<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class patients_appointments extends Model
{
    //
    protected $table = "patients_appointments_table";

    public function patient(): BelongsTo
    {
        return $this->belongsTo(patients::class);
    }
}
