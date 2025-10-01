<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        if (! User::where('email', 'admin@rnd.local')->exists()) {
            User::factory()->create([
                'name' => 'Administrador RND',
                'email' => 'admin@rnd.local',
                'password' => Hash::make('password'),
            ])->assignRole('admin');
        }
    }
}
