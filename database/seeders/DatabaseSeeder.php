<?php

namespace Database\Seeders;

use App\Enums\ContactRoles;
use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)
            ->has(Jiri::factory()->count(5), 'jiris')
            ->has(Contact::factory()->count(10), 'contacts')
            ->has(Project::factory()->count(5), 'projects')
            ->create()
            ->each(function ($user) {
                $user->jiris->each(function ($jiri) use ($user) {
                    $roles = random_int(0, 1) ? ContactRoles::Evaluator->value : ContactRoles::Student->value;
                    $jiri->contacts()->attach($user
                        ->contacts->random(10),
                        [
                            'role' => random_int(0, 1) ? ContactRoles::Evaluator->value : ContactRoles::Student->value,
                            'token' => $roles == ContactRoles::Evaluator->value ? bin2hex(random_bytes(32)) : null,
                        ]

                    );
                });
            });

        $ben = User::factory()
            ->has(Jiri::factory()->count(5), 'jiris')
            ->has(Contact::factory()->count(10), 'contacts')
            ->has(Project::factory()->count(5), 'projects')
            ->create([
                'name' => 'Ben',
                'email' => 'ben.marissiaux@gmail.com',
                'password' => 'AZERTY1234'
            ]);

        $ben->jiris->each(function ($jiri) use ($ben) {
            $ben->contacts->random(5)->each(function ($contact) use ($jiri) {
                $roles = random_int(0, 1) ? ContactRoles::Evaluator->value : ContactRoles::Student->value;
                $jiri->contacts()->attach($contact, [
                    'role' => $roles,
                    'token' => $roles == ContactRoles::Evaluator->value ? bin2hex(random_bytes(32)) : null,
                ]);
            });

            $ben->projects->random(5)->each(function ($project) use ($jiri) {
                $jiri->projects()->attach($project);
            });

        });
    }
}
