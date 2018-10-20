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
        $rows = DB::table('provider')->get(['id']);

        foreach ($rows as $row) {
            DB::table('provider')
                ->whereId($row->id)
                ->update(['hex_color' => substr(md5(rand()), 0, 6)]);
        }
    }
}
