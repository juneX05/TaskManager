<?php

namespace Application\Modules\System\Projects\Seeders;

use Application\Modules\Core\Projects\Models\Project;
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
        $permissions = [
            ['name' => 'projects.view', 'title' => 'View Projects',],
            ['name' => 'project.create', 'title' => 'Create project',],
            ['name' => 'project.edit', 'title' => 'Edit project',],
            ['name' => 'project.delete', 'title' => 'Delete project',],


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
