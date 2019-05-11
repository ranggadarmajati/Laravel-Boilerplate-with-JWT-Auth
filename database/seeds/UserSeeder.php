<?php

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
    	$creadentials = [
    		'first_name' => 'Maintenance',
    		'last_name'	 => 'One',
            'email'      => 'mtc@mailinator.com',
            'password'   => 'mtc12345',
        ];

        $creadentials1 = [
    		'first_name' => 'Admin',
    		'last_name'	 => 'One',
            'email'      => 'admin@mailinator.com',
            'password'   => 'admin12345',
        ];

        $creadentials2 = [
    		'first_name' => 'Super',
    		'last_name'	 => 'Admin',
            'email'      => 'superadmin@mailinator.com',
            'password'   => 'sa12345',
        ];

        $User  = Sentinel::registerAndActivate($creadentials);
        $User1 = Sentinel::registerAndActivate($creadentials1);
        $User2 = Sentinel::registerAndActivate($creadentials2);
        
        $role  = Sentinel::findRoleBySlug( 'maintenance' );
        $role1 = Sentinel::findRoleBySlug( 'admin' );
        $role2 = Sentinel::findRoleBySlug( 'superadmin' );
        
        $role->users()->attach( $User );
        $role1->users()->attach( $User1 );
        $role2->users()->attach( $User2 );
    }
}
