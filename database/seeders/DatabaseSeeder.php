<?php

namespace Database\Seeders;

use App\Enums\ContactRole;
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
                        [
                            'role' => random_int(0, 1) ?
                                ContactRole::Evaluator->value :
                                ContactRole::Student->value
                        ]);
                });
            });

        User::factory()
            ->has(Jiri::factory()->count(5), 'jiris')
            ->has(Contact::factory()->count(10), 'contacts')
            ->has(Project::factory()->count(5), 'projects')
            ->create([
                'name' => 'Ben',
                'email' => 'ben.marissiaux@gmail.com',
                'password' => 'AZERTY1234'
            ])
            ->each(function ($user) {
                $user->jiris->each(function ($jiri) use ($user) {
                    $jiri->evaluators()->attach($user->contacts->random(10), [
                        'role' => random_int(0, 1) ?
                            ContactRole::Evaluator->value :
                            ContactRole::Student->value
                    ]);
                });
            });

        $this->call([
            //Jiri::factory(10)->create(),
            //ContactSeeder::class,
            // ProjectSeeder::class,
        ]);
    }
}
