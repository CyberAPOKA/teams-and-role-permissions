<?php

namespace App\Providers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\InviteTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;
use App\Actions\Jetstream\UpdateTeamName;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('admin', 'Administrator', [
            'create',
            'read',
            'update',
            'delete',
        ])->description('Administrator users can perform any action.');

        Jetstream::role('editor', 'Editor', [
            'read',
            'create',
            'update',
        ])->description('Editor users have the ability to read, create, and update.');

        Jetstream::role('assistant', 'Assistente', [
            'view calendar',
            'view financial',
            'view patients',
        ])->description('Assistente só pode ver.');

        Jetstream::role('professional administrator', 'Profissional Administrador', [
            'view calendar',
            'update calendar',
            'create calendar',
            'delete calendar',
            'view financial',
            'update financial',
            'create financial',
            'delete financial',
            'view patients',
            'update patients',
            'create patients',
            'delete patients',
        ])->description('Permissão total');

        Jetstream::role('simple professional', 'Profissional Simples', [
            'view calendar',
            'update calendar',
            'create calendar',
            'view financial',
            'update financial',
            'create financial',
            'view patients',
            'update patients',
            'create patients',
        ])->description('Permissão de ler, criar e atualizar.');
    }
}
