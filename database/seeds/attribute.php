<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class attribute extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute')->delete();
        DB::table('attribute')->insert([
            ['id'=>1,'name'=>'Size'],
            ['id'=>2,'name'=>'color'],
        ]);
    }
}
