<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portals')->insert([
            'portal_nm' => 'BaseApp Admin Portal',
            'site_title' => 'Admin Portal',
            'site_desc' => 'Portal untuk administrator',
            'meta_desc' => '',
            'meta_keyword' => '',
            'user_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
