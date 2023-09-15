<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('email', 'swayamgupta09@gmail.com')->first();

        if ($user) {
            $newPassword = '12345
            
            ';
            $newPasswordHash = Hash::make($newPassword);

            $user->password = $newPasswordHash;
            $user->save();
        }
    }
}

