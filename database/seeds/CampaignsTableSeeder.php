<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class CampaignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        if (DB::table('campaigns')->get()->count() == 0) {
            for ($i = 0; $i < 30; $i++) {
                DB::table('campaigns')->insert([
                    'name' => $faker->sentence($maxNbWords = 2, $variableNbWords = true),
                    'headline' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                    'message' => $faker->text($maxNbChars = 100),
                    'time' => $faker->numberBetween($min = 1, $max = 24),
                ]);
            }
        }
    }
}
