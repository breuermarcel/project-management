<?php

namespace Breuermarcel\ProjectManagement\Http\Controllers;

use Breuermarcel\ProjectManagement\Models\Project;

class TaskController extends Controller
{
    public function create()
    {
        return view("project-management::tasks.create");
    }

    public function store()
    {

    }
}
