<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lottery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shop_name',
        'shop_code',
        'area_name',
        'customer_name',
        'customer_phone',
        'imei',
        'is_settled',
        'settled_at',
        'gift_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_settled' => 'boolean',
        'settled_at' => 'datetime',
        'gift_id' => 'integer',
    ];

    public function gift(): BelongsTo
    {
        return $this->belongsTo(Gift::class);
    }
}
