<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Whitelist extends Model
{
    public $incrementing = false;

    protected $fillable = [
        "npm",
    ];
}
