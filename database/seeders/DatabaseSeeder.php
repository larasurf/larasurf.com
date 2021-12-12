<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Brice Hartmann',
            'nickname' => 'bricehartmann',
            'email' => 'brice@bricehartmann.com',
        ]);

        User::factory(10)->create();
    }
}
