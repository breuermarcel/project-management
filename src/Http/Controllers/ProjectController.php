<?php

namespace Breuermarcel\ProjectManagement\Http\Controllers;

use Breuermarcel\ProjectManagement\Models\Customer;
use Breuermarcel\ProjectManagement\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::simplePaginate(15);

        return view("project-management::projects.index", compact("projects"));
    }

    public function create()
    {
        $customers = Customer::all();

        if ($customers->count() <= 0)
            return redirect(route("customers.create"))->withErrors(trans("Please create customer first."));

        // todo upload files

        return view("project-management::projects.create", compact("customers"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255|unique:bm_projects",
            "customer_id" => "required|integer|exists:bm_customers,id",
            "description" => "nullable|string|max:500"
        ]);

        if ($validator->fails()) {
            return redirect(route("projects.create"))->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $project = Project::create($validated);

        return redirect(route("projects.show", $project))->withSuccess(trans("Project created."));
    }

    public function show(Project $project)
    {
        return view("project-management::projects.show", compact("project"));
    }

    public function edit(Project $project)
    {
        $customers = Customer::all();

        return view("project-management::projects.edit", compact("project", "customers"));
    }

    public function update(Project $project, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255|unique:bm_projects,name," . $project->id,
            "customer_id" => "required|integer|exists:bm_customers,id",
            "description" => "nullable|string|max:500"
        ]);

        if ($validator->fails()) {
            return redirect(route("customers.edit", $project))->withErrors($validator);
        }

        $validated = $validator->validated();

        $project->update($validated);

        return redirect(route("projects.show", $project))->withSuccess(trans("Project updated."));
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect(route("projects.index"))->withSuccess(trans("Project deleted."));
    }
}
