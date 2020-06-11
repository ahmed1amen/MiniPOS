<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\product::insert([
            ['name'=>'كارت 10x15 كومبيوتر', 'price'=>'20' ,'created_at'=>carbon::now()],
            ['name'=>'كارت 30x40 كومبيوتر', 'price'=>'52.5','created_at'=>carbon::now()],
            ['name'=>'كارت 4x6 عادي', 'price'=>'21.3','created_at'=>carbon::now()],   ['name'=>'كارت 10x15 كومبيوتر', 'price'=>'20' ,'created_at'=>carbon::now()],
            ['name'=>'كارت 30x40 كومبيوتر', 'price'=>'52.5','created_at'=>carbon::now()],
            ['name'=>'كارت 4x6 عادي', 'price'=>'21.3','created_at'=>carbon::now()],   ['name'=>'كارت 10x15 كومبيوتر', 'price'=>'20' ,'created_at'=>carbon::now()],
            ['name'=>'كارت 30x40 كومبيوتر', 'price'=>'52.5','created_at'=>carbon::now()],
            ['name'=>'كارت 4x6 عادي', 'price'=>'21.3','created_at'=>carbon::now()],   ['name'=>'كارت 10x15 كومبيوتر', 'price'=>'20' ,'created_at'=>carbon::now()],
            ['name'=>'كارت 30x40 كومبيوتر', 'price'=>'52.5','created_at'=>carbon::now()],
            ['name'=>'كارت 4x6 عادي', 'price'=>'21.3','created_at'=>carbon::now()],   ['name'=>'كارت 10x15 كومبيوتر', 'price'=>'20' ,'created_at'=>carbon::now()],
            ['name'=>'كارت 30x40 كومبيوتر', 'price'=>'52.5','created_at'=>carbon::now()],
            ['name'=>'كارت 4x6 عادي', 'price'=>'21.3','created_at'=>carbon::now()],
        ]);


    }
}
