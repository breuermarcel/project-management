<?php

namespace Breuermarcel\ProjectManagement\Http\Controllers;

use Breuermarcel\ProjectManagement\Models\Project;
use Breuermarcel\ProjectManagement\Models\Task;
use Breuermarcel\ProjectManagement\Models\Tracking;
use Carbon\Carbon;

class TrackingController extends Controller
{
    public function start(Project $project, Task $task)
    {
        if ($task->tracking()->first() !== null) {
            return redirect(route("projects.show", [$project, $task]))->withError(trans("Tracking already started."));
        }

        $data["task_id"] = $task->id;
        $data["user_id"] = auth()->user()->id;

        // check if already started

        Tracking::create($data);

        return redirect(route("projects.show", [$project, $task]))->withSuccess(trans("Tracking started."));
    }

    public function end(Project $project, Task $task)
    {
        $data["task_id"] = $task->id;
        $data["user_id"] = auth()->user()->id;
        $data["ended_at"] = Carbon::now()->timestamp;

        Tracking::create($data);

        return redirect(route("projects.show", [$project, $task]))->withSuccess(trans("Tracking stopped."));
    }
}
