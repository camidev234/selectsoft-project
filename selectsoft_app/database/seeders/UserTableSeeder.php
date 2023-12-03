<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultUser = new User();

        $defaultUser->name = 'AdminCide';
        $defaultUser->last_name = 'Admin';
        $defaultUser->document_type_id = 1;
        $defaultUser->number_document = '000000000';
        $defaultUser->telephone = '00000000';
        $defaultUser->phone_number = 'address';
        $defaultUser->id_country = 1;
        $defaultUser->id_department = 1;
        $defaultUser->id_city = 1;
        $defaultUser->address = 'Soacha Parque';
        $defaultUser->birthdate = '2000-02-18';
        $defaultUser->email = 'AdminCide@sena.edu.co';
        $defaultUser->password = Hash::make('Cide899999034-1');
        $defaultUser->role_id = 4;

        $defaultUser->save();
    }
}
