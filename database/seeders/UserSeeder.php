<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        User::create([
            'name'  =>  'Sidharath Mankani',
            'email' =>  'mankanisidharath@gmail.com',
            'email_verified_at' =>  Carbon::now(),
            'password'  =>  Hash::make('password')
        ]);
        User::create([
            'name'  =>  'Mihir Karira',
            'email' =>  'karira.mihir@gmail.com',
            'email_verified_at' =>  Carbon::now(),
            'password'  =>  Hash::make('password')
        ]);
    }
}
