<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class document_type extends Model
{
    // public function User(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, foreignKey: 'id_document_type');
    // }

    // public function patient(): BelongsTo
    // {
    //     return $this->belongsTo(patients::class, foreignKey: 'id_document_type');
    // }

    // public function eps(): BelongsTo
    // {
    //     return $this->belongsTo(eps::class, foreignKey: 'id_document_type');
    // }
}
