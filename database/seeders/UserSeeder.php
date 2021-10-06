<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Database\Seeder;
// use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role;


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
            ['name' => 'Admin', 'name_short' => 'admin'],

        ];
        foreach ($allseeds as $seed) {
            if (!empty($seed['role'])) $role = Role::where('name', $seed['role'])->first();
            else $role = Role::create(['name' => $seed['name_short']]);
            $user = new User();
            $user->email = $seed['name_short'] . '@e-meal.com';
            $user->name = $seed['name'];
            $user->password = bcrypt('12345678');
            $user->save();
            $user->assignRole($role);
            // dd($user->id);
            $userInfo = new UserInfo();
            // $infodata = [
            //     'user_id' => $user->id,
            // ];
            // dd($infodata);
            $userInfo->user_id = $user->id;
            $userInfo->mobile = "01300021529";

            $userInfo->save();

        }
    }
}
