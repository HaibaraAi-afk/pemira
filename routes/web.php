<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganizationDashboardController;
use App\Http\Controllers\RecapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserVerificationController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\WhitelistController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ComitteeMiddleware;
use App\Http\Middleware\EnsureGroupBelongsToOrganization;
use App\Http\Middleware\EnsureUserCanVote;
use App\Http\Middleware\EnsureUserCanVoteGroup;
use App\Http\Middleware\EnsureUserHasBallot;
use App\Http\Middleware\EnsureUserIsVerified;
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

    Route::get("/verification", [UserVerificationController::class, "index"])
        ->name("verification");
    Route::post("/verification", [UserVerificationController::class, "store"])
        ->name("verification.store");

    Route::get("/logout", [AuthController::class, "logout"])->name("logout");

    Route::prefix("admin")->as("admin.")->middleware(AdminMiddleware::class)->group(function () {
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

    Route::prefix("organizations/{organization}")->middleware(ComitteeMiddleware::class)->group(function () {
        Route::get("/", [OrganizationDashboardController::class, "dashboard"])
            ->name("organizations.dashboard");
        Route::post("/open", [OrganizationDashboardController::class, "open"])
            ->name("organizations.open");
        Route::post("/close", [OrganizationDashboardController::class, "close"])
            ->name("organizations.close");
        Route::post("/reset", [OrganizationDashboardController::class, "reset"])
            ->name("organizations.reset");

        Route::prefix("/recap")->group(function () {
            Route::get("/", [RecapController::class, "index"])
                ->name("organizations.recap.confirmation");
            Route::get("/validate", [RecapController::class, "validate"])
                ->name("organizations.recap.validate");
            Route::get("/reset", [RecapController::class, "reset"])
                ->name("organizations.recap.reset");
            Route::post("/validate", [RecapController::class, "validateStore"])
                ->name("organizations.recap.validate.store");
            Route::get("/ballots", [RecapController::class, "ballots"])
                ->name("organizations.recap.ballots");
            Route::get("/result", [RecapController::class, "result"])
                ->name("organizations.recap.result");
        });
    });

    Route::prefix("/vote/{organization}")
        ->middleware([
            EnsureUserCanVote::class,
            EnsureUserIsVerified::class,
        ])
        ->group(function () {
            Route::get("/", [VoteController::class, "organization"])
                ->name("vote.organization");

            Route::get("/result", [VoteController::class, "result"])
                ->name("vote.result");
            Route::post("/result", [VoteController::class, "confirmResult"])
                ->name("vote.result.confirm");

            Route::middleware([
                EnsureUserHasBallot::class,
                EnsureGroupBelongsToOrganization::class,
                EnsureUserCanVoteGroup::class,
            ])->group(function () {
                Route::get("/{group}", [VoteController::class, "group"])
                    ->name("vote.group");
                Route::get("/{group}/previous", [VoteController::class, "groupPrevious"])
                    ->name("vote.group.previous");
                Route::post("/{group}", [VoteController::class, "storeGroup"])
                    ->name("vote.group.store");
            });
        });
});
