<?php

namespace Application\Modules\Configurations\DevConfigs\Tabs\ProjectStatuses\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Application\Modules\Configurations\DevConfigs\Tabs\ProjectStatuses\Models\ProjectStatus;


class ProjectStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_statuses.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];
        $view_data['data'] = ProjectStatus::all();

        return $this->render('Index', $view_data);
    }

    public function render($component, $props)
    {
        return Inertia::render('Configurations/DevConfigs/Tabs/ProjectStatuses/Views/' . $component, $props);
    }

    public function create()
    {
        abort_if(Gate::denies('project_status.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];
//$view_data['var'] = Model::all();

        return $this->render('Create', $view_data);
    }

    public function edit($id)
    {
        abort_if(Gate::denies('project_status.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];

		$view_data['project_status'] = ProjectStatus::where('id', $id)->first();

        return $this->render('Edit', $view_data);
    }

    public function show($id)
    {
        abort_if(Gate::denies('project_status.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];

		$view_data['project_status'] = ProjectStatus::where('id', $id)->first();

        return $this->render('Detail', $view_data);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('project_status.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
			'id' => ['required', 'integer'],
			'id' => ['required','','unique:project_statuses',],
			'name' => ['required','string','max:40','unique:project_statuses',],
			'color' => ['nullable','string',],
];
        $data = $request->all();
        Validator::make($data, $rules)->validate();

        $data = $request->all();
        $project_status = ProjectStatus::create($data);

        return redirect()->back()
            ->with('message', 'project_status Created Successfully.');
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('project_status.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rules = [
            'key_id' => ['required', 'integer'],

			'id' => ['required', 'integer'],
			'id' => ['required','',\Illuminate\Validation\Rule::unique('project_statuses')->ignore($request->key_id),],
			'name' => ['required','string','max:40',\Illuminate\Validation\Rule::unique('project_statuses')->ignore($request->key_id),],
			'color' => ['nullable','string',],

        ];
        Validator::make($request->all(), $rules)->validate();

        if ($request->has('key_id')) {
            ProjectStatus::find($request->input('key_id'))->update($request->all());

            return redirect()->back()
                ->with('message', 'ProjectStatus Updated Successfully.');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(Gate::denies('project_status.delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('id')) {
            ProjectStatus::find($request->input('id'))->delete();

            return redirect()->back();
        }
    }
}
