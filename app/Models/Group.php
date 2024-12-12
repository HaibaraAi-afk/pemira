<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function next($year, $major)
    {
        return $this->organization->groups()
            ->where("ordering", ">", $this->ordering)
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

    public function prev($year, $major)
    {
        return $this->organization->groups()
            ->where("ordering", "<", $this->ordering)
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
}
