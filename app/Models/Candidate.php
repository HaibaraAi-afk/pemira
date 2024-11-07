<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        "org_code",
        "group_id",
        "name_1",
        "name_2",
        "vision",
        "mission",
        "picture",
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, "org_code", "code");
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function ballots()
    {
        return $this->hasManyThrough(
            Ballot::class,
            BallotDetail::class,
            "candidate_id",
            "id",
            "id",
            "ballot_id"
        );
    }

    public function verified()
    {
        return $this->ballots->where("is_verified", true);
    }
}
