<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;

class TeamAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 6; $i++) {
            $owner = User::create([
                'name' => 'Proprietário ' . $i,
                'email' => 'proprietario' . $i . '@exemplo.com',
                'password' => bcrypt('123123123'),
            ]);

            $team = Team::create([
                'user_id' => $owner->id,
                'name' => 'Time ' . $i,
                'personal_team' => false,
            ]);

            $owner->current_team_id = $team->id;
            $owner->save();

            for ($j = 1; $j < 6; $j++) {
                $user = User::create([
                    'name' => 'Usuário ' . $j . '- Time' . $i,
                    'email' => 'usuario' . $i . $j . '@exemplo.com',
                    'password' => bcrypt('123123123'),
                    'current_team_id' => $team->id,
                ]);

                $team->users()->attach($user->id, ['role' => 'editor']);
            }
        }
    }
}
