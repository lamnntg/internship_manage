<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('1234'); // Default user password

        $d = [

            ['name' => 'Admin ',
            'email' => 'admin@admin.com',
            'password' => $password,
            'user_type' => 'admin',
            'username' => 'admin',
            'remember_token' => Str::random(10),
            ],

            ['name' => 'Mentor',
                'email' => 'mentor@mentor.com',
                'user_type' => 'mentor',
                'username' => 'mentor',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],

            ['name' => 'lam internship',
                'email' => 'internship@internship.com',
                'user_type' => 'internship',
                'username' => 'internship',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],
        ];
        DB::table('users')->insert($d);
    }
}
