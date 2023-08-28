<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
       $user = User::create([
            'name' => "Police_Hpt",
            'email' => "police_hpt@gmail.com",
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole('super-admin');
    }
}
