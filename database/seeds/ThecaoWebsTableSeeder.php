<?php

use Illuminate\Database\Seeder;
use Zent\Thecaoweb\Models\Thecaoweb;

class ThecaoWebsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thecaoweb::truncate();

        Thecaoweb::create([
            'name'     =>  "ThuThe"
        ]);
        Thecaoweb::create([
            'name'     =>  "MuaCard"
        ]);
        Thecaoweb::create([
            'name'     =>  "TrumThe"
        ]);
    }
}
