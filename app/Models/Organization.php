<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        "major",
        "name",
        "logo",
        "ordering",
        "is_open",
    ];

    protected function casts()
    {
        return [
            "is_open" => "boolean",
        ];
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function ballots()
    {
        return $this->hasMany(Ballot::class);
    }

    public function verifiedBallots()
    {
        return $this->ballots->where("is_verified", true);
    }
}
