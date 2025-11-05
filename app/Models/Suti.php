<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suti extends Model
{
    protected $table = 'suti';
    protected $fillable = ['nev', 'tipus', 'dijazott'];
}
