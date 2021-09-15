<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    
    public function run()
    {

        $roleAdmin = Role::create(['name'=>'admin']);
        $roleSeller = Role::create(['name'=>'seller']);
                    //sellers
        Permission::create(['name'=>'admin.sellers.index', 'descripcion'=>'ver funcionarios'])->syncRoles([$roleAdmin, $roleSeller]);
        Permission::create(['name'=>'admin.sellers.create', 'descripcion'=>'crear funcionario'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.sellers.edit', 'descripcion'=>'editar um funcionario'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.sellers.update', 'descripcion'=>'actualizar um funcionario'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.sellers.show', 'descripcion'=>'actualizar um funcionario'])->syncRoles([$roleAdmin, $roleSeller]);
        Permission::create(['name'=>'admin.sellers.delete', 'descripcion'=>'apagar um funcionario'])->assignRole($roleAdmin);
                    //roles
        Permission::create(['name'=>'admin.roles.index', 'descripcion'=>'ver roles'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.roles.create', 'descripcion'=>'criar um role'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.roles.edit', 'descripcion'=>'editar um role'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.roles.update', 'descripcion'=>'actualizar um role'])->assignRole($roleAdmin);
        Permission::create(['name'=>'admin.roles.delete', 'descripcion'=>'apagar um role'])->assignRole($roleAdmin);
                                        //formulario compra
        Permission::create(['name'=>'bs.tobuy', 'descripcion'=>'formulario compra'])->syncRoles([$roleAdmin, $roleSeller]);
        Permission::create(['name'=>'bs.bought', 'descripcion'=>'ruta final de la compra'])->syncRoles([$roleAdmin, $roleSeller]);

    }
}
