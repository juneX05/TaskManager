<?php

namespace Application\Modules\Configurations\DevConfigs\Tabs\TaskStatuses\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->setUpPermissions();

//        $task_statuses = [
//            ''
//        ];
//        DB::table('task_statuses')->insert($task_statuses);
    }

    private function setUpPermissions()
    {
        $permissions = [
            ['name' => 'task_statuses.view', 'title' => 'View TaskStatuses',],
            ['name' => 'task_status.view', 'title' => 'View TaskStatus',],
            ['name' => 'task_status.create', 'title' => 'Create TaskStatus',],
            ['name' => 'task_status.edit', 'title' => 'Edit TaskStatus',],
            ['name' => 'task_status.delete', 'title' => 'Delete TaskStatus',],
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
