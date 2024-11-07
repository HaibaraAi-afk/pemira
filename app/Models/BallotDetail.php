<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BallotDetail extends Model
{
    protected $fillable = [
        "org_code",
        "group_id",
        "ballot_id",
        "candidate_id",
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, "org_code", "code");
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function ballot()
    {
        return $this->belongsTo(Ballot::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
