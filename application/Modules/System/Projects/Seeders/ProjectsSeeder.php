<?php

namespace Application\Modules\System\Projects\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->setUpPermissions();

//        $projects = [
//            ''
//        ];
//        DB::table('projects')->insert($projects);
    }

    private function setUpPermissions()
    {
        $permissions = [
            ['name' => 'projects.view', 'title' => 'View Projects',],
            ['name' => 'project.view', 'title' => 'View Project',],
            ['name' => 'project.create', 'title' => 'Create Project',],
            ['name' => 'project.edit', 'title' => 'Edit Project',],
            ['name' => 'project.delete', 'title' => 'Delete Project',],
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
