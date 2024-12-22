<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class medical_order extends Model
{
    //
    protected $table = "medical_order_table";


    public function order_types(): HasOne
    {
        return $this->hasOne(order_type::class, foreignKey: 'name_order');
    }

    public function medical_record(): BelongsTo
    {
        return $this->belongsTo(medical_records::class, "id_medical_record");
    }
}
