<?php

use Illuminate\Database\Seeder;
use Zent\Thecaoapi\Models\Thecaoapi;

class ThecaoApisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThecaoApi::truncate();

        ThecaoApi::create([
            'loaithe'     =>  1,
            'menhgia'  =>  10000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  1,
            'menhgia'  =>  20000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  1,
            'menhgia'  =>  30000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  1,
            'menhgia'  =>  50000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  1,
            'menhgia'  =>  100000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  1,
            'menhgia'  =>  200000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  1,
            'menhgia'  =>  300000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  1,
            'menhgia'  =>  500000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  1,
            'menhgia'  =>  1000000,
            'api'    =>  1
        ]);

        // Mobi
        ThecaoApi::create([
            'loaithe'     =>  2,
            'menhgia'  =>  10000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  2,
            'menhgia'  =>  20000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  2,
            'menhgia'  =>  30000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  2,
            'menhgia'  =>  50000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  2,
            'menhgia'  =>  100000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  2,
            'menhgia'  =>  200000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  2,
            'menhgia'  =>  300000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  2,
            'menhgia'  =>  500000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  2,
            'menhgia'  =>  1000000,
            'api'    =>  1
        ]);
        // Vina
        ThecaoApi::create([
            'loaithe'     =>  3,
            'menhgia'  =>  10000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  3,
            'menhgia'  =>  20000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  3,
            'menhgia'  =>  30000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  3,
            'menhgia'  =>  50000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  3,
            'menhgia'  =>  100000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  3,
            'menhgia'  =>  200000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  3,
            'menhgia'  =>  300000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  3,
            'menhgia'  =>  500000,
            'api'    =>  1
        ]);
        ThecaoApi::create([
            'loaithe'     =>  3,
            'menhgia'  =>  1000000,
            'api'    =>  1
        ]);
    }
}
