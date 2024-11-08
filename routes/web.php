<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhitelistController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render("welcome");
});

Route::prefix("admin")->group(function () {
    Route::get("/", function () {
        return Inertia::render("admin/dashboard");
    })->name("admin.index");

    Route::get("/organizations/test", function () {
        return Inertia::render("organizations/dashboard");
    })->name("organizations.test");

    Route::resource("users", UserController::class);
    Route::resource("whitelists", WhitelistController::class);
    Route::resource("organizations", OrganizationController::class);
    Route::resource("organizations.groups", GroupController::class);
    Route::resource(
        "organizations.groups.candidates",
        CandidateController::class
    );
});
