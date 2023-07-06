<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = Activity::all();

        foreach ($activities as $activity){
            $tags = Tag::inRandomOrder()->limit(rand(1,3))->get();
            $activity->tags()->attach($tags);
        }
    }
}
