<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('permissions')->insert([
//            'name' => str_random(10),
//            'display_name' => str_random(10),
//            'description' => str_random(10),
//        ]);
        factory(App\Models\Permission::class, 10)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Models\Permission::class)->make());
        });
    }
}
