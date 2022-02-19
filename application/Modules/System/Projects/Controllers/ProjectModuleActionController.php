<?php

namespace Application\Modules\System\Projects\Controllers;

use App\Http\Controllers\Controller;
use Application\Modules\System\Actions\Models\Action;
use Application\Modules\System\Modules\Models\Module;
use Application\Modules\System\Tasks\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Application\Modules\System\Projects\Models\Project;
use Application\Modules\Core\Users\Models\User;

class ProjectModuleActionController extends Controller
{
    public function render($component, $props)
    {
        return Inertia::render('System/Projects/Views/actions/Actions' . $component, $props);
    }

    public function index($id)
    {
        abort_if(Gate::denies('modules.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Project::with(['modules'])->where('id', $id)->get();

        dd($data);
        return $this->render('Index', ['data' => $data]);
    }

    public function create($module_id) {
        abort_if(Gate::denies('module.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $module = Module::with(['project'])->where('id', $module_id)->first();
        return $this->render('Create', ['module' => $module]);
    }

    public function edit($action_id) {
        abort_if(Gate::denies('module.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $action = Action::with(['module'])->where('id',$action_id)->first();
        return $this->render('Edit', compact('action'));
    }

    public function show($id) {
        abort_if(Gate::denies('project.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $action = Action::with(['module'])->where('id',$id)->first();
        $tasks = Task::where('action_id',$id)->get();

        return $this->render('Details', compact('action', 'tasks'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('project.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Validator::make($request->all(), [
            'module_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ])->validate();

        $data['user_id'] = Auth::id();

        Action::create($data);

        return redirect()->back()
            ->with('message', 'Project Module Action Created Successfully.');
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
            Action::find($request->input('key_id'))->update($request->all());

            return redirect()->back()
                ->with('message', 'Action Updated Successfully.');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(Gate::denies('project.delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('id')) {
            Action::find($request->input('id'))->delete();

            return redirect()->back();
        }
    }
}
