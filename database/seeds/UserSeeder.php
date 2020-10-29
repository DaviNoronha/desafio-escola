<?php

use App\Models\Perfil;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfil = Perfil::where('nome', 'master')->first();

        User::create([
            'name' => 'Master',
            'email' => 'master@email.com',
            'perfil_id' => $perfil->id,
            'password' => bcrypt('12345678')
            ]);
    }
}
