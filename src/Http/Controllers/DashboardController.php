<?php

namespace Breuermarcel\ProjectManagement\Http\Controllers;

use Breuermarcel\ProjectManagement\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $openTasks = Task::openTasks();

        return view("project-management::dashboard", compact("openTasks"));
    }
}
