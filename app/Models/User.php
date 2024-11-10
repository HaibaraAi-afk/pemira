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
        "google_id",
        "avatar"
    ];

    public function ballots()
    {
        return $this->hasMany(Ballot::class);
    }
}
