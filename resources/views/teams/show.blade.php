@seoTitle(__('Team Settings'))

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @include('teams.update-team-name-form')

        @if($permissions['canAddTeamMembers'])
            <x-section-border />

            <div class="mt-10 sm:mt-0" dusk="add-team-member">
                @include('teams.add-team-member')
            </div>
        @endif

        @if($permissions['canAddTeamMembers'] && $team->teamInvitations->isNotEmpty())
            <x-section-border />

            <div class="mt-10 sm:mt-0" dusk="team-member-invitations">
                @include('teams.team-member-invitations')
            </div>
        @endif

        @if($team->users->isNotEmpty())
            <x-section-border />

            <div class="mt-10 sm:mt-0" dusk="manage-team-members">
                @include('teams.manage-team-members')
            </div>
        @endif

        @if($permissions['canDeleteTeam'] && !$team->personal_team)
            <x-section-border />

            <div class="mt-10 sm:mt-0" dusk="delete-team-form">
                @include('teams.delete-team-form')
            </div>
        @endif
    </div>

