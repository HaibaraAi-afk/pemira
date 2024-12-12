<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function firstGroup($year, $major)
    {
        return $this->groups()->where("ordering", 1)
            ->where(function (Builder $query) use ($year) {
                $query->where("year", null)
                    ->orWhere("year", $year);
            })
            ->where(function (Builder $query) use ($major) {
                $query->where("major", null)
                    ->orWhere("major", $major);
            })
            ->first();
    }

    public function groups()
    {
        return $this->hasMany(Group::class)->orderBy("ordering");
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function ballots()
    {
        return $this->hasMany(Ballot::class);
    }

    public function ballotDetails()
    {
        return $this->hasMany(BallotDetail::class);
    }

    public function verifiedBallots()
    {
        return $this->ballots->where("is_verified", true);
    }
}
