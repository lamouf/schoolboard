<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
         $this->call(SchoolboardTableSeeder::class);
         factory(App\Student::class , 50)->create();
         factory(App\Grade::class , 200)->create();
//         $this->call(App\Student::class);
//         $this->call(App\Grade::class);
    }
}
