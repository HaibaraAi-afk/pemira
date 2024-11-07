<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        "npm",
        "email",
        "name",
        "org_code",
        "type",
    ];

    public function ballots()
    {
        return $this->hasMany(Ballot::class);
    }
}
