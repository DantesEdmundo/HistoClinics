<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class eps extends Model
{
    //
    protected $table = "eps";


    public function patient(): HasOne
    {
        return $this->hasOne(patients::class);
    }
}
