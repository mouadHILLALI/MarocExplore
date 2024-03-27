<?php

namespace Database\Seeders;

<<<<<<< HEAD
=======
use App\Models\User;
>>>>>>> c171594ac7350153c2511fc83cfcd3549ed96a5e
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
=======
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
>>>>>>> c171594ac7350153c2511fc83cfcd3549ed96a5e
    }
}
