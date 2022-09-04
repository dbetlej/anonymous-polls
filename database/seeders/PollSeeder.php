<?php

namespace Database\Seeders;

use App\Models\Poll;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $polls = Poll::factory()->count(3)->create();
        foreach ($polls as $poll) {
            $poll->questions()->factory()->count(10)->create([
                'poll_id' => $poll->id,
            ]);
        }
    }
}
