<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TableOwner extends Model
{
    use HasFactory;

    protected $fillable = ['table_id', 'user_id', 'status'];

    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}
