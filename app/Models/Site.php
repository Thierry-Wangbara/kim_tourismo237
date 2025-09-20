<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Site extends Model
{
    protected $fillable = [
        'name',
        'description',
        'location',
        'region',
        'latitude',
        'longitude',
        'image',
        'price',
        'rating',
        'rating_count',
        'features',
        'gallery',
        'contact_phone',
        'contact_email',
        'opening_hours',
        'access_info',
        'is_active',
        'user_id',
    ];

    protected $casts = [
        'features' => 'array',
        'gallery' => 'array',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'price' => 'decimal:2',
        'rating' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get the user that manages this site
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the average rating
     */
    public function getAverageRatingAttribute()
    {
        return $this->rating_count > 0 ? round($this->rating / $this->rating_count, 1) : 0;
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return $this->price ? number_format($this->price, 0, ',', ' ') . ' FCFA' : 'Gratuit';
    }

    /**
     * Scope for active sites
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for sites by region
     */
    public function scopeByRegion($query, $region)
    {
        return $query->where('region', $region);
    }

    /**
     * Get the bookings for this site
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
