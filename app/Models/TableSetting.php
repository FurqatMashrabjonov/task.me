<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableSetting extends Model
{
    use HasFactory;
    protected $fillable = ['table_id', 'background_id'];

    public function background(){
        return $this->belongsTo(Background::class);
    }
}
