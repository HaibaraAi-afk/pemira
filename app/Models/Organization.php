<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $primaryKey = "code";
    public $incrementing = false;

    protected $fillable = [
        "code",
        "name",
        "logo",
        "is_public",
        "is_open",
    ];

    protected function casts()
    {
        return [
            "is_public" => "boolean",
            "is_open" => "boolean",
        ];
    }

    public function groups()
    {
        return $this->hasMany(Group::class, "org_code", "code");
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class, "org_code", "code");
    }

    public function ballots()
    {
        return $this->hasMany(Ballot::class, "org_code", "code");
    }

    public function verified()
    {
        return $this->ballots->where("is_verified", true);
    }
}
