<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        App\User::create([
            'name'=>'developer',
            'email'=>'admin@admin.com',
            'password'=>bcrypt(12345678),
            'type_user'=>'admin',
        ]);

        App\User::create([
            'name'=>'mis',
            'email'=>'mis@mail.com',
            'password'=>bcrypt(12345678),
            'type_user'=>'user',
        ]);

        

      
    }
}
