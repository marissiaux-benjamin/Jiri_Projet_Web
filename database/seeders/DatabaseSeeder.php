<?php

namespace Database\Seeders;

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
        User::factory(10)
            ->has(Jiri::factory()->count(5), 'jiris')
            ->has(Contact::factory()->count(5), 'contacts')
            ->has(Project::factory()->count(5), 'projects')
            ->create();

        User::factory()
            ->has(Jiri::factory()->count(5), 'jiris')
            ->has(Contact::factory()->count(5), 'contacts')
            ->has(Project::factory()->count(5),'projects')
            ->create([
                'name' => 'Ben',
                'email' => 'ben.marissiaux@gmail.com',
                'password' => 'AZERTY1234'
            ]);

        $this->call([
            //Jiri::factory(10)->create(),
            //ContactSeeder::class,
           // ProjectSeeder::class,
        ]);
    }
}
