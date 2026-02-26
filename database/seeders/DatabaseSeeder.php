<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name'       => 'Admin User',
            'email'      => 'admin@company.com',
            'password'   => Hash::make('password'),
            'role'       => 'admin',
            'department' => 'IT',
            'is_active'  => true,
        ]);

        // Manager
        User::create([
            'name'       => 'Jane Manager',
            'email'      => 'manager@company.com',
            'password'   => Hash::make('password'),
            'role'       => 'manager',
            'department' => 'HR',
            'is_active'  => true,
        ]);

        // 10 employees
        foreach (range(1, 10) as $i) {
            User::create([
                'name'       => "Employee {$i}",
                'email'      => "employee{$i}@company.com",
                'password'   => Hash::make('password'),
                'role'       => 'employee',
                'department' => ['Engineering','HR','Sales','Finance','IT'][array_rand([0,1,2,3,4])],
                'is_active'  => true,
            ]);
        }

        // Categories
        $categories = [
            ['name' => 'General', 'color' => '#6366f1'],
            ['name' => 'HR',      'color' => '#10b981'],
            ['name' => 'IT',      'color' => '#3b82f6'],
            ['name' => 'Events',  'color' => '#f59e0b'],
            ['name' => 'Policy',  'color' => '#ef4444'],
            ['name' => 'Urgent',  'color' => '#dc2626'],
        ];

        foreach ($categories as $cat) {
            Category::create([...$cat, 'is_active' => true]);
        }
    }
}
