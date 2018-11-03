<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        if (DB::table('subscribers')->get()->count() == 0) {
            for ($i = 0; $i < 30; $i++) {
                DB::table('subscribers')->insert([
                    'name' => $faker->name,
                    'ip_address' => $faker->ipv4,
                    'timezone' => $faker->timezone,
                    'user_agent' => $faker->userAgent,
                ]);
            }
        }
    }
}
