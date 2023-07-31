<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { // user has factory method which lets you specify how many models you want to generate and calling this create method would create those models and then immediately store them inside the database
        \App\Models\User::factory(10)->create();
        // this would create an additional two models which would just be unverified
        \App\Models\User::factory(2)->unverified()->create();
        \App\Models\Task::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}