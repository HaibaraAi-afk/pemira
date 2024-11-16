<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        "organization_id",
        "year",
        "major",
        "name",
        "ordering",
        "min_candidates",
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
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

    public function next()
    {
        return $this->organization->groups
            ->where("ordering", ">", $this->ordering)
            ->first();
    }
}
