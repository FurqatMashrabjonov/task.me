<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NotificationSetting extends Model
{
    use HasFactory;

    protected $fillable = ['notification_id', 'table_id'];

    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}
