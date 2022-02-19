<?php

namespace Application\Modules\System\Modules\Controllers;

use App\Http\Controllers\Controller;
use Application\Modules\System\Projects\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Application\Modules\System\Modules\Models\Module;
use Application\Modules\Core\Users\Models\User;

class ModuleController extends Controller
{
    public function render($component, $props)
    {
        return Inertia::render('System/Modules/Views/' . $component, $props);
    }

    public function index($project_id = null)
    {
        abort_if(Gate::denies('modules.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data['data'] = Module::with(['project']);
        $view_data['project_id'] = $project_id;

        return $this->render('Index', $view_data);
    }

    public function create($project_id = null) {
        abort_if(Gate::denies('module.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view_data = [];
        $view_data['projects'] = Project::all();
        $view_data['project_id'] = $project_id;

        return $this->render('Create', $view_data);
    }

    public function edit($id) {
        abort_if(Gate::denies('module.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $module = Module::where('id',$id)->first();
        return $this->render('Edit', ['module' => $module]);
    }

    public function show($id) {
        abort_if(Gate::denies('module.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $module = Module::where('id',$id)->first();
        return $this->render('Details', ['module' => $module]);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('module.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Validator::make($request->all(), [
            'name' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ])->validate();

        $data['user_id'] = Auth::id();

        Module::create($data);

        return redirect()->back()
            ->with('message', 'Module Created Successfully.');
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('module.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Validator::make($request->all(), [
            'key_id' => ['required'],
            'title' => ['required'],
            'name' => ['required'],
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
        abort_if(Gate::denies('module.delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('id')) {
            Module::find($request->input('id'))->delete();

            return redirect()->back();
        }
    }
}
