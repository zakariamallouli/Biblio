<?php
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();
        DB::table('role_user')->truncate();

       

        $admin = User::create([
        	'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'cin' => 'EE45894',
            'adresse' => Str::random(12),
            'tel' => '0612457896',
        	'password' => Hash::make('password')
        ]);

        $author = User::create([
        	'name' => 'Author User',
            'email' => 'author@author.com',
            'cin' => 'EE45894',
            'adresse' => Str::random(12),
            'tel' => '0612457896',
        	'password' => Hash::make('password')
        ]);

        $user = User::create([
        	'name' => 'Generic User',
            'email' => 'user@user.com',
            'cin' => 'EE45894',
            'adresse' => Str::random(12),
            'tel' => '0612457896',
        	'password' => Hash::make('password')
        ]);
 
        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first(); 

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
