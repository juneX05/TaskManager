<?php

namespace Application\Modules\System\Actions\Controllers;

use App\Http\Controllers\Controller;
use Application\Modules\System\Modules\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Application\Modules\System\Actions\Models\Action;
use Application\Modules\Core\Users\Models\User;

class ActionController extends Controller
{
    public function render($component, $props)
    {
        return Inertia::render('System/Actions/Views/' . $component, $props);
    }

    public function index()
    {
        abort_if(Gate::denies('actions.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Action::all();

        return $this->render('Index', ['data' => $data]);
    }

    public function create() {
        abort_if(Gate::denies('action.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->render('Create', []);
    }

    public function edit($id) {
        abort_if(Gate::denies('action.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $action = Action::where('id',$id)->first();
        return $this->render('Edit', ['action' => $action]);
    }

    public function show($id) {
        abort_if(Gate::denies('action.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $action = Action::with(['modules'])->where('id',$id)->first();

        return $this->render('Details', compact('action',));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('action.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Validator::make($request->all(), [
            'name' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ])->validate();

        $data['user_id'] = Auth::id();

        Action::create($data);

        return redirect()->back()
            ->with('message', 'Action Created Successfully.');
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('action.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Validator::make($request->all(), [
            'key_id' => ['required'],
            'title' => ['required'],
            'name' => ['required'],
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
        abort_if(Gate::denies('action.delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('id')) {
            Action::find($request->input('id'))->delete();

            return redirect()->back();
        }
    }
}
