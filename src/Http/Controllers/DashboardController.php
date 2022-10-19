<?php

namespace Breuermarcel\ProjectManagement\Http\Controllers;

use Breuermarcel\ProjectManagement\Models\Task;
use Breuermarcel\ProjectManagement\Models\Tracking;

class DashboardController extends Controller
{
    public function index()
    {
        $openTasks = Task::openTasks();
        $openTimeTrackings = Tracking::openTrackings();

        return view("project-management::dashboard", compact("openTasks", "openTimeTrackings"));
    }
}
