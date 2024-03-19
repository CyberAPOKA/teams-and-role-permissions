<?php

namespace App\Http\Controllers\Debug;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class DebugController extends Controller
{
    public function user()
    {
        $user = Auth::user();
        $team = $user->currentTeam;
        $role = $user->teamRole($team);
        $permissions = $user->teamPermissions($team);

        return Inertia::render('Debug/User', [
            'user' => $user,
            'team' => $team,
            'user_role' => $role,
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }
}
