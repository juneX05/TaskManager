<?php

namespace Application\Modules\System\Projects\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Application\Modules\System\Projects\Models\Project;
use Application\Modules\Core\Users\Models\User;

class ProjectController extends Controller
{
    public function render($component, $props)
    {
        return Inertia::render('System/Projects/Views/' . $component, $props);
    }

    public function index()
    {
        abort_if(Gate::denies('projects.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Project::all();

        return $this->render('Index', ['data' => $data]);
    }

    public function create() {
        abort_if(Gate::denies('project.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->render('Create', []);
    }

    public function edit($id) {
        abort_if(Gate::denies('project.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project = Project::where('id',$id)->first();
        return $this->render('Edit', ['project' => $project]);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('project.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Validator::make($request->all(), [
            'name' => ['required'],
            'title' => ['required'],
        ])->validate();

        Project::create($request->all());

        return redirect()->back()
            ->with('message', 'Project Created Successfully.');
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('project.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Validator::make($request->all(), [
            'id' => ['required'],
            'title' => ['required'],
            'name' => ['required'],
        ])->validate();

        if ($request->has('id')) {
            Project::find($request->input('id'))->update($request->all());

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
