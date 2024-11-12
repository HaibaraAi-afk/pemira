<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    protected $fillable = [
        "organization_id",
        "user_id",
        "ktm",
        "verification",
        "is_verified",
        "verified_at",
    ];

    protected $casts = [
        "is_verified" => "boolean",
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
