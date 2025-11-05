<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tartalom extends Model
{
    protected $table = 'tartalom';
    protected $fillable = ['sutiid', 'mentes'];
}
