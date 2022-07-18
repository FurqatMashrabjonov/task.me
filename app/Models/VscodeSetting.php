<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VscodeSetting extends Model
{
    use HasFactory;
    protected $fillable = ['languageId', 'project', 'file'];
}
