<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class SchoolboardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $schoolboards = [
            ['name' => 'CSM', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['name' => 'CSMB', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]
        ];
        DB::table('schoolboards')->insert($schoolboards);

    }
}
