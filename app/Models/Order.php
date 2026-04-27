<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'name',
        'email',
        'phone',
        'address',
        'total_amount',
        'payment_method',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'total_amount' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function canBeCancelledByUser(): bool
    {
        return in_array($this->status, ['pending', 'processing'], true)
            && $this->created_at instanceof Carbon
            && $this->created_at->copy()->addDays(3)->isFuture();
    }

    public function canBeReorderedByUser(): bool
    {
        return $this->status === 'delivered';
    }
}
