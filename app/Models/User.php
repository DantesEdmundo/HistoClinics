<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'id_document_type',
        'document_number',
        'email',
        'id_rol',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function rol(): HasOne
    {
        return $this->hasOne(related: rol::class, foreignKey: 'id', localKey: 'id_rol');
    }

    public function document_type(): HasOne
    {
        return $this->hasOne(related: document_type::class, foreignKey: 'id', localKey: 'id_document_type');
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(appointments::class, foreignKey: 'id_doctor')->chaperone();
    }

    public function medical_records(): HasMany
    {
        return $this->hasMany(medical_records::class, foreignKey: 'id_doctor')->chaperone();
    }
}
