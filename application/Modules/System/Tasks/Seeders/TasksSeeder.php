<?php

namespace Application\Modules\System\Tasks\Seeders;

use Application\Modules\Core\Tasks\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'tasks.view', 'title' => 'View Tasks',],
            ['name' => 'task.create', 'title' => 'Create task',],
            ['name' => 'task.edit', 'title' => 'Edit task',],
            ['name' => 'task.delete', 'title' => 'Delete task',],


//            ['name' => 'questions.view', 'title' => 'View Questions',],
        ];
        DB::table('permissions')->insert($permissions);


        foreach ($permissions as $permission) {
            DB::table('user_permissions')
                ->insert([
                            'user_id' => 1,
                            'permission_name' => $permission['name'],
                            'status' => 1,
                      ]);
        }
    }
}
