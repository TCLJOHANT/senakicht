<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $role1 = Role::create(['name'=>'Admin']);
       $role2 = Role::create(['name'=>'Aprendiz']);

       Permission::create(['name'=>'admin.home'])->syncRoles([$role1,$role2]);

       Permission::create(['name'=>'admin.recipes.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name'=>'admin.recipes.destroy'])->syncRoles([$role1,$role2]);


       Permission::create(['name'=>'admin.products.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name'=>'admin.products.destroy'])->syncRoles([$role1,$role2]);

       Permission::create(['name'=>'admin.comments.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name'=>'admin.comments.destroy'])->syncRoles([$role1,$role2]);
    }
}
