<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class rol extends Model
{
    use HasFactory;

    protected $table = "roles";

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
