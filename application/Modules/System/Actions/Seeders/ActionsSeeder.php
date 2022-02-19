<?php

namespace Application\Modules\System\Actions\Seeders;

use Application\Modules\Core\Actions\Models\Action;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'actions.view', 'title' => 'View Actions',],
            ['name' => 'action.create', 'title' => 'Create action',],
            ['name' => 'action.edit', 'title' => 'Edit action',],
            ['name' => 'action.delete', 'title' => 'Delete action',],


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