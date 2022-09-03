<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         if(config('app.env') != 'production') {
             User::factory(1)->create();

             $this->call([
                 PollSeeder::class,
             ]);
         }
    }
}
