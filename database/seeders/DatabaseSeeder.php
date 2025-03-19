<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Teacher::factory(50)->create()->each(function ($user) {
            $user->socialMedia()->createMany([
                ['type' => 'F', 'url' => fake()->url()],
                ['type' => 'I', 'url' => fake()->url()],
                ['type' => 'L', 'url' => fake()->url()],
            ]);
        });
        $this->call(CourseSeeder::class);
    }
}
