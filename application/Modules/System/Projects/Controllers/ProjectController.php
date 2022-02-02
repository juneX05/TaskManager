<?php

namespace Application\Modules\System\Projects\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Application\Modules\System\Projects\Models\Project;
use Application\Modules\Configurations\DevConfigs\Tabs\ProjectStatuses\Models\ProjectStatus; 


class ProjectController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('projects.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];
        $view_data['data'] =  Project::with(['project_status',])->get();

        return $this->render('Index', $view_data);
    }

    public function render($component, $props)
    {
        return Inertia::render('System/Projects/Views/' . $component, $props);
    }

    public function create()
    {
        abort_if(Gate::denies('project.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];
		$view_data['project_statuses'] = ProjectStatus::all();


        return $this->render('Create', $view_data);
    }

    public function edit($id)
    {
        abort_if(Gate::denies('project.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];

		$view_data['project'] = Project::with(['project_status',])->where('id', $id)->first();
		$view_data['project_statuses'] = ProjectStatus::all();

        return $this->render('Edit', $view_data);
    }

    public function show($id)
    {
        abort_if(Gate::denies('project.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];

		$view_data['project'] =  Project::with(['project_status',])->where('id', $id)->first();

        return $this->render('Detail', $view_data);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('project.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
			'name' => ['required','string','max:40','unique:projects',],
			'description' => ['nullable','string',],
];
        $data = $request->all();
        Validator::make($data, $rules)->validate();

        $data['project_status_id'] = 1;
        $project = Project::create($data);

        return redirect()->back()
            ->with('message', 'project Created Successfully.');
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('project.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'key_id' => ['required', 'integer'],

			'name' => ['required','string','max:40',\Illuminate\Validation\Rule::unique('projects')->ignore($request->key_id),],
			'description' => ['nullable','string',],

        ];
        Validator::make($request->all(), $rules)->validate();

        if ($request->has('key_id')) {
            Project::find($request->input('key_id'))->update($request->all());

            return redirect()->back()
                ->with('message', 'Project Updated Successfully.');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(Gate::denies('project.delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('id')) {
            Project::find($request->input('id'))->delete();

            return redirect()->back();
        }
    }
}
