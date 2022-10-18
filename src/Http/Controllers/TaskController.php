<?php

namespace Breuermarcel\ProjectManagement\Http\Controllers;

use App\Models\User;
use Breuermarcel\ProjectManagement\Models\Project;
use Breuermarcel\ProjectManagement\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function create(Project $project)
    {
        $users = User::all();

        $task = new Task();
        $statuses = $task->status;

        return view("project-management::tasks.create", compact("project", "users", "statuses"));
    }

    public function store(Project $project, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "description" => "nullable|string|max:500",
            "status" => "required|integer|between:0,5",
            "deadline" => "nullable|date",
            "expenditure" => "nullable|digits_between:0,250",
            "signed_user_id" => "nullable|integer|exists:users,id",
        ]);

        if ($validator->fails()) {
            return redirect(route("tasks.create", $project))->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $validated["project_id"] = $project->id;
        $validated["created_user_id"] = auth()->user()->id;

        Task::create($validated);

        $project = Project::findOrFail($validated["project_id"]);

        return redirect(route("projects.show", $project))->withSuccess(trans("Task created."));
    }

    public function edit()
    {

    }
}
