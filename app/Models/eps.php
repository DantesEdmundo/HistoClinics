<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class eps extends Model
{
    //
    protected $table = "eps";


    public function document_type(): HasOne
    {
        return $this->hasOne(related: document_type::class, foreignKey: "id_document_type");
    }
}
