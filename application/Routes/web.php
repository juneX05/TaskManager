<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/generate', function () {
    $name = trim('   Label  ');
    $name = ucwords($name);
    $name = Str::remove(' ', $name);
    $data['moduleName'] = $name;

    $data['moduleType'] = 'System';
    $data['moduleIcon'] = 'mdi-tag';
    $data['relations'] = [
        [
            'type' => 'BelongsTo',
            'module' => 'TaskStatus',
            'location' => 'DevConfigs',
            'column' => 'task_status_id',
            'display' => 'name',
        ],
        [
            'type' => 'BelongsTo',
            'module' => 'Project',
            'location' => 'System',
            'column' => 'project_id',
            'display' => 'name',
        ],
        [
            'type' => 'HasMany',
            'module' => 'Label',
            'location' => 'System',
            'column' => 'label_id',
            'display' => 'name',
        ],
    ];

    $data['columns'] = [
        [
            'display_name' => 'Name',
            'in_form' => true,
            'name' => 'name',
            'type' => 'string',
            'size' => 40,
            'not_null' => true,
            'default' => null,
            'unique' => true,
        ],
        [
            'display_name' => 'Description',
            'in_form' => true,
            'name' => 'description',
            'type' => 'text',
            'size' => null,
            'not_null' => false,
            'default' => null,
            'unique' => false,
        ],
        [
            'display_name' => 'Start Date',
            'in_form' => true,
            'name' => 'start_date',
            'type' => 'date',
            'size' => null,
            'not_null' => true,
            'default' => null,
            'unique' => false,
        ],
        [
            'display_name' => 'Completion Date',
            'in_form' => true,
            'name' => 'completion_date',
            'type' => 'date',
            'size' => null,
            'not_null' => true,
            'default' => null,
            'unique' => false,
        ],
        [
            'display_name' => 'Task Status',
            'in_form' => true,
            'name' => 'task_status_id',
            'type' => 'integer',
            'size' => null,
            'not_null' => true,
            'default' => null,
            'unique' => false,
        ],
        [
            'display_name' => 'Project',
            'in_form' => true,
            'name' => 'project_id',
            'type' => 'integer',
            'size' => null,
            'not_null' => true,
            'default' => null,
            'unique' => false,
        ],
    ];

    $moduleGenerator = new \Application\Generator\ModuleGenerator($data);
});
