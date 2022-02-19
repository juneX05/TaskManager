<?php

namespace Application\Modules\System\Modules\Seeders;

use Application\Modules\Core\Modules\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'modules.view', 'title' => 'View Modules',],
            ['name' => 'module.create', 'title' => 'Create module',],
            ['name' => 'module.edit', 'title' => 'Edit module',],
            ['name' => 'module.delete', 'title' => 'Delete module',],


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
