<?php

namespace Breuermarcel\ProjectManagement\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $table = "bm_timetrackings";

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        "started_at",
        "ended_at",
        "task_id",
        "user_id"
    ];

    protected $dates = [
        "started_at",
        "ended_at"
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public static function openTrackings()
    {
        return self::where("started_at", "!=", null)
            ->where("ended_at", "=", null)
            ->where("user_id", "=", auth()->user()->id)
            ->with("task")
            ->get();
    }
}
