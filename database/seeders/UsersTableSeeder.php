<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        
        $admin = User::create([
            'role' => 'admin',
            'name' => '',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        
        $utilisateur = User::create([
            'role' => 'utilisateur',
            'name' => '',
            'email' => 'utilisateur@utilisateur.com',
            'password' => Hash::make('password'),
                ]);
        
        $adminRole = Role::where('name', 'admin')->first();
        $utilisateurRole = Role::where('name', 'utilisateur')->first();      
        
        $admin->roles()->attach($adminRole);
        $utilisateur->roles()->attach($utilisateurRole);

    }
}
