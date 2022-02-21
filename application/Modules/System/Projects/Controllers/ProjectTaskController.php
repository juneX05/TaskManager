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

class ProjectTaskController extends Controller
{
    private $project_id;

    public function render($component, $props)
    {
        $props['project'] = Project::where('id', $this->project_id)->first();

        return Inertia::render('System/Projects/Views/project_tasks/ProjectTasks' . $component, $props);
    }

    public function index($project_id)
    {
        abort_if(Gate::denies('project.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Task::with(['project'])->where('project_id', $project_id)->get();
        $this->project_id = $project_id;

        return $this->render('Index', compact('data'));
    }

    public function create($project_id) {
        abort_if(Gate::denies('module.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->project_id = $project_id;

        return $this->render('Create', compact('project_id'));
    }

    public function edit($id) {
        abort_if(Gate::denies('module.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task = Task::with(['project'])->where('id',$id)->first();
        $this->project_id = $task->project->id;

        return $this->render('Edit', compact('task'));
    }

    public function show($id) {
        abort_if(Gate::denies('project.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task = Task::with(['project'])->where('id',$id)->first();
        $this->project_id = $task->project->id;

        return $this->render('Details', compact('task'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('project.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Validator::make($request->all(), [
            'project_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable'],
        ])->validate();

        $data['user_id'] = Auth::id();

        Task::create($data);

        return redirect()->back()
            ->with('message', 'Project Module Action Task Created Successfully.');
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('project.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Validator::make($request->all(), [
            'key_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable'],
        ])->validate();

        if ($request->has('key_id')) {
            Task::find($request->input('key_id'))->update($request->all());

            return redirect()->back()
                ->with('message', 'Task Updated Successfully.');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(Gate::denies('project.delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('id')) {
            Task::find($request->input('id'))->delete();

            return redirect()->back();
        }
    }
}
