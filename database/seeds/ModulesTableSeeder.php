<?php

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::truncate();

        Module::create([
            'name'  =>  'layout',
            'display_name'  =>  'Layout',
            'module_category_id'    => 2,
            'status'    =>  0
        ]);

        Module::create([
            'name'  =>  'customer',
            'display_name'  =>  'Customer',
            'module_category_id'    =>  2,
            'status'    =>  1
        ]);

        Module::create([
            'name'  =>  'user',
            'display_name'  =>  'Users',
            'module_category_id'    =>  2,
            'status'    =>  1
        ]);

        Module::create([
            'name'  =>  'module',
            'display_name'  =>  'Module',
            'module_category_id'    =>  2,
            'status'    =>  1
        ]);

        Module::create([
            'name'  =>  'role',
            'display_name'  =>  'Roles',
            'module_category_id'    =>  3,
            'status'    =>  1
        ]);

        Module::create([
            'name'  =>  'permission',
            'display_name'  =>  'Permission',
            'module_category_id'    =>  3,
            'status'    =>  1
        ]);

        Module::create([
            'name'  =>  'system_log',
            'display_name'  =>  'Logs',
            'module_category_id'    =>  3,
            'status'    =>  0
        ]);

        Module::create([
            'name'  =>  'activity_log',
            'display_name'  =>  'History',
            'module_category_id'    =>  3,
            'status'    =>  1
        ]);
        Module::create([
            'name'  =>  'thecao',
            'display_name'  =>  'Thẻ cào',
            'module_category_id'    =>  1,
            'status'    =>  1
        ]);
        Module::create([
            'name'  =>  'thecaoapi',
            'display_name'  =>  'Api Thẻ cào',
            'module_category_id'    =>  1,
            'status'    =>  1
        ]);
        Module::create([
            'name'  =>  'thecaoweb',
            'display_name'  =>  'Web Thẻ cào',
            'module_category_id'    =>  1,
            'status'    =>  1
        ]);
    }
}
