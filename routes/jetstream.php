<?php

use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Splade\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Splade\CurrentUserController;
use Laravel\Jetstream\Http\Controllers\Splade\OtherBrowserSessionsController;
use Laravel\Jetstream\Http\Controllers\Splade\PrivacyPolicyController;
use Laravel\Jetstream\Http\Controllers\Splade\ProfilePhotoController;
use Laravel\Jetstream\Http\Controllers\Splade\TeamController;
use Laravel\Jetstream\Http\Controllers\Splade\TeamMemberController;
use Laravel\Jetstream\Http\Controllers\Splade\TermsOfServiceController;
use Laravel\Jetstream\Http\Controllers\Splade\UserProfileController;
use Laravel\Jetstream\Http\Controllers\TeamInvitationController;
use Laravel\Jetstream\Jetstream;

Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
    if (Jetstream::hasTermsAndPrivacyPolicyFeature()) {
        Route::get('/terms-of-service', [TermsOfServiceController::class, 'show'])->name('terms.show');
        Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('policy.show');
    }

    $authMiddleware = config('jetstream.guard')
            ? 'auth:'.config('jetstream.guard')
            : 'auth';

    $authSessionMiddleware = config('jetstream.auth_session', false)
            ? config('jetstream.auth_session')
            : null;

    Route::group(['middleware' => array_values(array_filter([$authMiddleware, $authSessionMiddleware]))], function () {
        // User & Profile...
        Route::get('/profile', [UserProfileController::class, 'show'])
            ->name('profile.show');

        Route::delete('/other-browser-sessions', [OtherBrowserSessionsController::class, 'destroy'])
            ->name('other-browser-sessions.destroy');

        Route::delete('/profile-photo', [ProfilePhotoController::class, 'destroy'])
            ->name('current-user-photo.destroy');

        if (Jetstream::hasAccountDeletionFeatures()) {
            Route::delete('/user', [CurrentUserController::class, 'destroy'])
                ->name('current-user.destroy');
        }

        Route::group(['middleware' => 'verified'], function () {
            // API...
            if (Jetstream::hasApiFeatures()) {
                Route::get('/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
                Route::post('/api-tokens', [ApiTokenController::class, 'store'])->name('api-tokens.store');
                Route::get('/api-tokens/{token}', [ApiTokenController::class, 'edit'])->name('api-tokens.edit');
                Route::put('/api-tokens/{token}', [ApiTokenController::class, 'update'])->name('api-tokens.update');
                Route::delete('/api-tokens/{token}', [ApiTokenController::class, 'destroy'])->name('api-tokens.destroy');
            }

            // Teams...
            if (Jetstream::hasTeamFeatures()) {
                Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
                Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
                Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
                Route::put('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
                Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
                Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
                Route::post('/teams/{team}/members', [TeamMemberController::class, 'store'])->name('team-members.store');
                Route::get('/teams/{team}/members/{user}', [TeamMemberController::class, 'edit'])->name('team-members.edit');
                Route::put('/teams/{team}/members/{user}', [TeamMemberController::class, 'update'])->name('team-members.update');
                Route::delete('/teams/{team}/members/{user}', [TeamMemberController::class, 'destroy'])->name('team-members.destroy');

                Route::get('/team-invitations/{invitation}', [TeamInvitationController::class, 'accept'])
                    ->middleware(['signed'])
                    ->name('team-invitations.accept');

                Route::delete('/team-invitations/{invitation}', [TeamInvitationController::class, 'destroy'])
                    ->name('team-invitations.destroy');
            }
        });
    });
});
