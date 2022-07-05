<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'user_id'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeFront($query)
    {
        return $query->select(['name', 'slug', 'created_at']);
    }

    public function ownerUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function settings(): HasOne
    {
        return $this->hasOne(TableSetting::class);
    }

}
