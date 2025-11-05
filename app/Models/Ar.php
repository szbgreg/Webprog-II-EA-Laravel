<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ar extends Model
{
    protected $table = 'ar';
    protected $fillable = ['sutiid', 'ertek', 'egyseg'];
}
