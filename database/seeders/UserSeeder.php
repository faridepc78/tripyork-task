<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        if (!User::query()->count()) {
            User::factory(10)->create();
        } else {
            $this->command->warn('Users has already been created');
        }
    }
}
