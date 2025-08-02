<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;

class UserDetailSeeder extends Seeder
{
    public function run(): void
{
    UserDetail::updateOrCreate(
        ['email' => 'john.doe@example.com'], // Check by email
        [
            'name' => 'John Doe',
            'password' => Hash::make('1234567890'),
        ]
    );

    UserDetail::updateOrCreate(
        ['email' => 'john.doe1@example.com'], // Check by email
        [
            'name' => 'John Doe1',
            'password' => Hash::make('12345678901'),
        ]
    );
}
}
