<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Candidate;
use App\Models\Instructor;
use App\Models\Recruiter;
use App\Models\Selector;
use App\Models\User;
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

        $this->call([StudyStatusTableSeeder::class]);
        $this->call([SalaryTypesTableSeeder::class]);
        $this->call([StudyLevelsTableSeeder::class]);
        $this->call([SupportTypesTableSeeder::class]);
        $this->call([DocumentTypesTableSeeder::class]);
        $this->call([CountriesTableSeeder::class]);
        $this->call([DepartamentsTableSeeder::class]);
        $this->call([CitiesTableSeeder::class]);
        $this->call([RolesTableSeeder::class]);
        $this->call([UserTableSeeder::class]);
        $this->call([InstructorTableSeeder::class]);
        $this->call([WorkDaysTableSeeder::class]);
        $this->call([StatusApplicationTableSeeder::class]);
        $this->call([WorkAreaTableSeeder::class]);

        // factories 

        User::factory()->count(40)->create();
        Candidate::factory()->count(10)->create();
        Recruiter::factory()->count(10)->create();
        Selector::factory()->count(10)->create();
        Instructor::factory()->count(10)->create();
    }
}
