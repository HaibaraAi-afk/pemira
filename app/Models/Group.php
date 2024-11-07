<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        "org_code",
        "name",
        "ordering",
        "is_public",
    ];

    protected function casts()
    {
        return [
            "is_public" => "boolean",
        ];
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, "org_code", "code");
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function ballots()
    {
        return $this->hasMany(Ballot::class);
    }

    public function verified()
    {
        return $this->ballots->where("is_verified", true);
    }
}
