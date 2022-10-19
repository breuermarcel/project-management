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
        $data["task_id"] = $task->id;
        $data["user_id"] = auth()->user()->id;

        $latestTracking = $task->trackings()->where("user_id", auth()->user()->id)->latest()->first();

        if ($latestTracking !== null) {
            if ($latestTracking->ended_at === null) {
                // exists but not ended yet
                return redirect(route("projects.show", [$project, $task]))->withError(trans("Tracking already started."));
            } else {
                // exists but new tracking
                Tracking::create($data);

                return redirect(route("projects.show", [$project, $task]))->withSuccess(trans("Tracking started."));
            }

        } else {
            // first tracking
            Tracking::create($data);

            return redirect(route("projects.show", [$project, $task]))->withSuccess(trans("First tracking started."));
        }
    }

    public function end(Project $project, Task $task, Tracking $tracking)
    {
        if ($tracking->user_id !== auth()->user()->id) {
            return redirect(route("projects.show", [$project, $task]))->withError(trans("Tracking can not be stopped."));
        }

        $tracking->ended_at = Carbon::now()->timestamp;
        $tracking->update();

        return redirect(route("projects.show", [$project, $task]))->withSuccess(trans("Tracking stopped."));
    }
}
