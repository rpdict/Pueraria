<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Role::class, 10)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Models\Role::class)->make());
        });
    }
}
