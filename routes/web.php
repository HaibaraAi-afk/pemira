<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganizationDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\WhitelistController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware("guest")->group(function () {
    Route::get("/login", fn() => Inertia::render("login"))->name("login");
    Route::get("/auth/redirect", [AuthController::class, "redirect"])
        ->name("auth.redirect");
    Route::get("/auth/callback", [AuthController::class, "callback"])
        ->name("auth.callback");
});

Route::middleware("auth")->group(function () {
    Route::get("/", [VoteController::class, "index"])->name("index");
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");

    Route::prefix("admin")->as("admin.")->group(function () {
        Route::get("/", [AdminDashboardController::class, "index"])
            ->name("dashboard");

        Route::resource("whitelists", WhitelistController::class);
        Route::post("/whitelists/validate", [WhitelistController::class, "validate"])
            ->name("whitelists.validate");
        Route::post("/whitelists/single", [WhitelistController::class, "storeSingle"])
            ->name("whitelists.store.single");

        Route::resource("users", UserController::class);
        Route::resource("organizations", OrganizationController::class);

        Route::resource("organizations.groups", GroupController::class);
        Route::resource(
            "organizations.groups.candidates",
            CandidateController::class
        );
    });

    Route::prefix("organizations/{organization}")->group(function () {
        Route::get("/", [OrganizationDashboardController::class, "dashboard"])
            ->name("organizations.dashboard");
    });
});
