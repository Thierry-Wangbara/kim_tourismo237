<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'site_id',
        'visit_date',
        'visit_time',
        'visitors_count',
        'total_price',
        'status',
        'special_requests',
        'notes',
    ];

    protected $casts = [
        'visit_date' => 'date',
        'visit_time' => 'datetime:H:i',
        'total_price' => 'decimal:2',
    ];

    /**
     * Get the user that made the booking
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the site that was booked
     */
    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    /**
     * Get the status badge attributes
     */
    public function getStatusBadgeAttribute()
    {
        $statuses = [
            'pending' => ['label' => 'En attente', 'class' => 'bg-warning'],
            'confirmed' => ['label' => 'Confirmée', 'class' => 'bg-success'],
            'cancelled' => ['label' => 'Annulée', 'class' => 'bg-danger'],
            'completed' => ['label' => 'Terminée', 'class' => 'bg-success'],
            'rejected' => ['label' => 'Refusée', 'class' => 'bg-danger'],
        ];

        return $statuses[$this->status] ?? $statuses['pending'];
    }

    /**
     * Scope for pending bookings
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for confirmed bookings
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }
}
