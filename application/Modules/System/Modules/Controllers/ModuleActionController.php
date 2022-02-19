<?php

namespace Application\Modules\System\Modules\Controllers;

use App\Http\Controllers\Controller;
use Application\Modules\System\Actions\Models\Action;
use Application\Modules\System\Modules\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Application\Modules\System\Projects\Models\Project;
use Application\Modules\Core\Users\Models\User;

class ModuleActionController extends Controller
{
    public function render($component, $props)
    {
        return Inertia::render('System/Modules/Views/actions/Actions' . $component, $props);
    }

    public function index($id)
    {
        abort_if(Gate::denies('modules.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Project::with(['modules'])->where('id', $id)->get();

        dd($data);
        return $this->render('Index', ['data' => $data]);
    }

    public function create($id) {
        abort_if(Gate::denies('module.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->render('Create', ['module_id' => $id]);
    }

    public function edit($id, $action_id) {
        abort_if(Gate::denies('module.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $action = Action::where('id',$action_id)->first();
        return $this->render('Edit', ['module' => $action, 'module_id' => $id]);
    }

    public function show($id) {
        abort_if(Gate::denies('project.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project = Project::where('id',$id)->first();
        $modules = Module::where('id', $project->id)->get();

        return $this->render('Details', compact('project','modules'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('project.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Validator::make($request->all(), [
            'project_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ])->validate();

        $data['user_id'] = Auth::id();

        Module::create($data);

        return redirect()->back()
            ->with('message', 'Project Module Created Successfully.');
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('project.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Validator::make($request->all(), [
            'key_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ])->validate();

        if ($request->has('key_id')) {
            Module::find($request->input('key_id'))->update($request->all());

            return redirect()->back()
                ->with('message', 'Module Updated Successfully.');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(Gate::denies('project.delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('id')) {
            Module::find($request->input('id'))->delete();

            return redirect()->back();
        }
    }
}
