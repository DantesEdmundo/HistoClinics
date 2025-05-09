<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class patients extends Model
{
    //
    protected $table = "patients";

    protected $fillable = [
        'name',
        'last_name',
        'birthdate',
        'id_document_type',
        'id_eps',
        'document_number',
        'address',
        'phone',
    ];
    public function appointments(): BelongsToMany
    {
        return $this->belongsToMany(appointments::class, "patients_appointments", "id_patient", "id_appointment");
    }

    public function document_type(): HasOne
    {
        return $this->hasOne(document_type::class, "id_document_type");
    }

    public function medical_records(): HasMany
    {
        return $this->hasMany(medical_records::class, "id");
    }

    public function eps()
    {
        return $this->belongsTo(eps::class, 'id_eps');
    }
}
