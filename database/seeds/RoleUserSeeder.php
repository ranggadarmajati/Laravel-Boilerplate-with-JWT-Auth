<?php

use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('roles')->get()->count() == 0){
            
         $role = [
	            'name' => 'Superadmin',
	            'slug' => 'superadmin',
	            'permissions' => [
	                'administrator' => true,
	            ],
    		];
        $administratorRole = Sentinel::getRoleRepository()->createModel()->fill($role)->save();
     
        DB::table('roles')->insert([
            ['name' => 'admin', 'slug' => 'Admin'],
            ['name' => 'customer', 'slug' => 'Customer'],
        ]);  
         
        }else{
             echo "\e[31mTable is not empty, therefore NOT "; 
        }
    }
}
