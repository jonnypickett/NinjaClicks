<?php

use Illuminate\Database\Seeder;

class ProviderColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $rows = DB::table('provider')->get(['id']);

        foreach ($rows as $row) {
            DB::table('provider')
                ->whereId($row->id)
                ->update(['hex_color' => $faker->hexcolor]);
        }
    }
}
