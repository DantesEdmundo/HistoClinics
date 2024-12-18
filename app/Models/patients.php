<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class patients extends Model
{
    //
    protected $table = "patients_table";

    public function medical_records(): HasMany
    {
        return $this->hasMany(medical_records::class);
    }

    public function patients_appointments(): HasMany
    {
        return $this->hasMany(patients_appointments::class);
    }

    public function document_type(): BelongsTo
    {
        return $this->belongsTo(document_type::class);
    }
    public function eps(): BelongsTo
    {
        return $this->belongsTo(eps::class);
    }
}
