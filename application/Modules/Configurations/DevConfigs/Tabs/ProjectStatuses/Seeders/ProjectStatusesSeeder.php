<?php

namespace Application\Modules\Configurations\DevConfigs\Tabs\ProjectStatuses\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->setUpPermissions();

//        $project_statuses = [
//            ''
//        ];
//        DB::table('project_statuses')->insert($project_statuses);
    }

    private function setUpPermissions()
    {
        $permissions = [
            ['name' => 'project_statuses.view', 'title' => 'View ProjectStatuses',],
            ['name' => 'project_status.view', 'title' => 'View ProjectStatus',],
            ['name' => 'project_status.create', 'title' => 'Create ProjectStatus',],
            ['name' => 'project_status.edit', 'title' => 'Edit ProjectStatus',],
            ['name' => 'project_status.delete', 'title' => 'Delete ProjectStatus',],
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
