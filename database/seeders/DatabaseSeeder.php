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
                    $jiri->contacts()->attach($user
                        ->contacts->random(10),
                        ['role' => random_int(0, 1) ? ContactRoles::Evaluator->value : ContactRoles::Student->value]);
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
                $jiri->contacts()->attach($contact, ['role' => random_int(0, 1) ? ContactRoles::Evaluator->value : ContactRoles::Student->value]);
            });

            $ben->projects->random(5)->each(function ($project) use ($jiri) {
                $jiri->projects()->attach($project);
            });

        });
    }
}
