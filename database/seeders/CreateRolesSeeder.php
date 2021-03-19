<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'id' => '1',
                'role' => 'isAdmin'
            ],
            [
                'id' => '2',
                'role' => 'isUser'
            ]
            ];
            foreach($user as $key => $value){
                Role::create($value);
            }
    }
}
