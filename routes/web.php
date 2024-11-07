<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhitelistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "PEMIRA 2025";
});

Route::prefix("admin")->group(function () {
    Route::resource("users", UserController::class);
    Route::resource("whitelists", WhitelistController::class);
    Route::resource("organizations", OrganizationController::class);
    Route::resource("organizations.groups", GroupController::class);
    Route::resource(
        "organizations.groups.candidates",
        CandidateController::class
    );
});
