<?php

namespace Application\Modules\System\Tasks\Seeders;

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
        $this->setUpPermissions();

//        $tasks = [
//            ''
//        ];
//        DB::table('tasks')->insert($tasks);
    }

    private function setUpPermissions()
    {
        $permissions = [
            ['name' => 'tasks.view', 'title' => 'View Tasks',],
            ['name' => 'task.view', 'title' => 'View Task',],
            ['name' => 'task.create', 'title' => 'Create Task',],
            ['name' => 'task.edit', 'title' => 'Edit Task',],
            ['name' => 'task.delete', 'title' => 'Delete Task',],
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
