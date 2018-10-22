<?php

use Illuminate\Database\Seeder;

class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('clicks')->truncate();
        DB::table('provider')->truncate();
        factory(App\Provider::class, 4)->create()->each(function ($p) {
            factory(App\Click::class, rand(5, 25))->create(['provider_id' => $p->id]);
        });
    }
}
