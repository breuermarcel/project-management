<?php

namespace Breuermarcel\ProjectManagement\Http\Controllers;

use Breuermarcel\ProjectManagement\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::simplePaginate(15);

        return view("project-management::projects.index", compact("projects"));
    }

    public function create()
    {
        return view("project-management::projects.create");
    }

    public function store(Request $request)
    {

    }
}
