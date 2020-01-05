<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::getdefaultRoles();
        factory(User::class,5)->create();
        foreach($roles as $role)
        {
            $role_id = Role::create(['name'=>$role]);
            
            if($role === 'SuperAdmin') {
                $user = factory(User::class)->create([
                    'name' => 'Super Admin',
                    'email' => 'super@testing.com',
                    'password' => bcrypt('super') 
                ]);
                $user->assignRole($role_id);
            }
            if($role === 'Admin') {
                $user = factory(User::class)->create([
                    'name' => 'Thiri Win',
                    'email' => 'admin@testing.com',
                    'password' => bcrypt('admin')
                ]);
                $user->assignRole($role_id);
            }
        }
    }
}
