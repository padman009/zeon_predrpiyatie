<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Branch;
use App\Models\Role;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        // Sample roles
        $engineer = Role::create(['name' => 'Инженер']);
        $employeeRole = Role::create(['name' => 'Сотрудник']);

        // Sample employees for Almaty branch
        $almatyBranch = Branch::where('name', 'Алматы')->first();
        Employee::create(['branch_id' => $almatyBranch->id, 'role_id' => $engineer->id, 'name' => 'Байжан Аскарова']);
        Employee::create(['branch_id' => $almatyBranch->id, 'role_id' => $employeeRole->id, 'name' => 'Алишер Байтурсынов']);

        // Sample employees for Nur-Sultan branch
        $nursultanBranch = Branch::where('name', 'Нур-Султан')->first();
        Employee::create(['branch_id' => $nursultanBranch->id, 'role_id' => $engineer->id, 'name' => 'Айдана Жаксыбекова']);
        Employee::create(['branch_id' => $nursultanBranch->id, 'role_id' => $employeeRole->id, 'name' => 'Еркебулан Мұқанов']);

        // Sample employees for Atyrau branch
        $atyrauBranch = Branch::where('name', 'Атырау')->first();
        Employee::create(['branch_id' => $atyrauBranch->id, 'role_id' => $engineer->id, 'name' => 'Мерейке Жұмабекова']);
        Employee::create(['branch_id' => $atyrauBranch->id, 'role_id' => $employeeRole->id, 'name' => 'Нұрлан Кенжебеков']);

    }
}
