<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Whitelist extends Model
{
    public $primaryKey = "npm";
    public $incrementing = false;

    protected $fillable = [
        "npm",
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'npm', 'npm');
    }
}
