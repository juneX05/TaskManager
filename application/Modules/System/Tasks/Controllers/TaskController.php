<?php

namespace Application\Modules\System\Tasks\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Application\Modules\System\Tasks\Models\Task;
use Application\Modules\Configurations\DevConfigs\Tabs\TaskStatuses\Models\TaskStatus; 
use Application\Modules\System\Projects\Models\Project; 


class TaskController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tasks.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];
        $view_data['data'] =  Task::with(['task_status','project',])->get();

        return $this->render('Index', $view_data);
    }

    public function render($component, $props)
    {
        return Inertia::render('System/Tasks/Views/' . $component, $props);
    }

    public function create()
    {
        abort_if(Gate::denies('task.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];
		$view_data['task_statuses'] = TaskStatus::all();
		$view_data['projects'] = Project::all();


        return $this->render('Create', $view_data);
    }

    public function edit($id)
    {
        abort_if(Gate::denies('task.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];

		$view_data['task'] = Task::with(['task_status','project',])->where('id', $id)->first();
		$view_data['task_statuses'] = TaskStatus::all();
		$view_data['projects'] = Project::all();

        return $this->render('Edit', $view_data);
    }

    public function show($id)
    {
        abort_if(Gate::denies('task.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];

		$view_data['task'] =  Task::with(['task_status','project',])->where('id', $id)->first();

        return $this->render('Detail', $view_data);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('task.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
			'name' => ['required','string','max:40','unique:tasks',],
			'description' => ['nullable','string',],
			'start_date' => ['required','date_format:d-m-Y',],
			'completion_date' => ['required','date_format:d-m-Y',],
			'task_status_id' => ['required','',],
			'project_id' => ['required','',],
];
        $data = $request->all();
        Validator::make($data, $rules)->validate();

        $task = Task::create($data);

        return redirect()->back()
            ->with('message', 'task Created Successfully.');
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('task.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'key_id' => ['required', 'integer'],

			'name' => ['required','string','max:40',\Illuminate\Validation\Rule::unique('tasks')->ignore($request->key_id),],
			'description' => ['nullable','string',],
			'start_date' => ['required','date_format:d-m-Y',],
			'completion_date' => ['required','date_format:d-m-Y',],
			'task_status_id' => ['required','',],
			'project_id' => ['required','',],

        ];
        Validator::make($request->all(), $rules)->validate();

        if ($request->has('key_id')) {
            Task::find($request->input('key_id'))->update($request->all());

            return redirect()->back()
                ->with('message', 'Task Updated Successfully.');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(Gate::denies('task.delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('id')) {
            Task::find($request->input('id'))->delete();

            return redirect()->back();
        }
    }
}
