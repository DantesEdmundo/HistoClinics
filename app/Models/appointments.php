<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class appointments extends Model
{
    protected $table = "appointments";

    public function User(): HasOne
    {
        return $this->hasOne(related: User::class, foreignKey: "id_rol");
    }

    public function medical_records(): HasMany
    {
        return $this->hasMany(medical_records::class, foreignKey: 'id_patient');
    }

    protected $fillable = ['id', 'id_patient', 'id_doctor', 'date_time', 'status'];
    public $timestamps = false;
}
