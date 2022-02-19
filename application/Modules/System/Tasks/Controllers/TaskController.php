<?php

namespace Application\Modules\System\Tasks\Controllers;

use App\Http\Controllers\Controller;
use Application\Modules\System\Modules\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Application\Modules\System\Tasks\Models\Task;
use Application\Modules\Core\Users\Models\User;

class TaskController extends Controller
{
    public function render($component, $props)
    {
        return Inertia::render('System/Tasks/Views/' . $component, $props);
    }

    public function index()
    {
        abort_if(Gate::denies('tasks.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Task::all();

        return $this->render('Index', ['data' => $data]);
    }

    public function create() {
        abort_if(Gate::denies('task.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->render('Create', []);
    }

    public function edit($id) {
        abort_if(Gate::denies('task.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task = Task::where('id',$id)->first();
        return $this->render('Edit', ['task' => $task]);
    }

    public function show($id) {
        abort_if(Gate::denies('task.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task = Task::with(['modules'])->where('id',$id)->first();

        return $this->render('Details', compact('task',));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('task.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Validator::make($request->all(), [
            'name' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ])->validate();

        $data['user_id'] = Auth::id();

        Task::create($data);

        return redirect()->back()
            ->with('message', 'Task Created Successfully.');
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('task.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Validator::make($request->all(), [
            'key_id' => ['required'],
            'title' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
        ])->validate();

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
