<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    public function run()
    {
        Branch::create(['name' => 'Алматы']);
        Branch::create(['name' => 'Нур-Султан']);
        Branch::create(['name' => 'Атырау']);
    }
}
