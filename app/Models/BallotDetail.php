<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BallotDetail extends Model
{
    protected $fillable = [
        "organization_id",
        "group_id",
        "ballot_id",
        "candidate_id",
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
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
