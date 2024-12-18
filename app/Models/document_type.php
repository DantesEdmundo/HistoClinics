<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class document_type extends Model
{
    //
    public function patient(): HasOne
    {
        return $this->hasOne(patients::class);
    }
}
