<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ronaldo',
            'email' => 'ronaldo@gmail.com',
            'password' =>  Hash::make('1234'),
        ]);

        User::create([
            'name' => 'Sebastian paz',
            'email' => 'sebastian@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        User::create([
            'name' => 'German David',
            'email' => 'german@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        User::create([
            'name' => 'Juan David',
            'email' => 'juan@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        User::create([
            'name' => 'Sebastian ',
            'email' => 'sebas@gmail.com',
            'password' => Hash::make('1234'),
        ]);
        User::create([
            'name' => 'johan',
            'email' => 'soytcljohant@gmail.com',
            'password' => Hash::make('1234'),
        ])->assignRole('Admin');
    }
}
