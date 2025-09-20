<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'account_type',
        'phone',
        'location',
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

    /**
     * Get the user's account type badge
     */
    public function getAccountTypeBadgeAttribute()
    {
        $types = [
            'tourist' => ['label' => 'Touriste', 'class' => 'bg-primary'],
            'site_manager' => ['label' => 'Gestionnaire', 'class' => 'bg-success'],
            'admin' => ['label' => 'Administrateur', 'class' => 'bg-danger'],
        ];

        return $types[$this->account_type] ?? $types['tourist'];
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->account_type === 'admin';
    }

    /**
     * Check if user is site manager
     */
    public function isSiteManager()
    {
        return $this->account_type === 'site_manager';
    }


    /**
     * Check if user is tourist
     */
    public function isTourist()
    {
        return $this->account_type === 'tourist';
    }

    /**
     * Get the user's full name
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the user's name (for backward compatibility)
     */
    public function getNameAttribute()
    {
        return $this->getFullNameAttribute();
    }

    /**
     * Get the bookings made by this user
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get the sites managed by this user (for site managers)
     */
    public function sites(): HasMany
    {
        return $this->hasMany(Site::class);
    }
}