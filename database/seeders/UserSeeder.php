<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $allseeds = [
            // ['name' => 'Brand Admin', 'name_short' => 'badmin', 'brand_user' => false],
            // ['name' => 'Brand Manager', 'name_short' => 'bmanager', 'brand_user' => true],
            // ['name' => 'Brand Manager', 'name_short' => 'bowner', 'brand_user' => true],
            // ['name' => 'brand', 'name_short' => 'brand', 'brand_user' => false],
            // ['name' => 'Production Admin', 'name_short' => 'padmin', 'brand_user' => false],
            // ['name' => 'Placement Admin', 'name_short' => 'pladmin', 'brand_user' => false],
            // ['name' => 'Production Manager', 'name_short' => 'pmanager', 'brand_user' => false],
            // ['name' => 'Jeep Brand Manager', 'name_short' => 'jeep_bmanager', 'brand_user' => 8, 'role' => "bmanager"],
            ['name' => 'Admin', 'name_short' => 'admin', 'role' => "admin"],

        ];
        foreach ($allseeds as $seed) {
            if (!empty($seed['role'])) $role = Role::where('name', $seed['role'])->first();
            else $role = Role::create(['name' => $seed['name_short']]);
            $user = new User();
            $user->email = $seed['name_short'] . '@wigwag.tv';
            $user->name = $seed['name'];
            $user->password = bcrypt('NPass123456$');
            $user->save();
            $user->assignRole($role);
        }
    }
}
