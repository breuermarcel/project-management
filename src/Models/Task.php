<?php

namespace Breuermarcel\ProjectManagement\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "bm_tasks";

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "description",
        "status",
        "deadline",
        "expenditure",
        "project_id",
        "created_user_id",
        "signed_user_id"
    ];

    public array $statuses = [
        "planned",
        "in progress",
        "on hold",
        "completed",
        "rejected"
    ];

    protected $dates = [
        "deadline"
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tracking()
    {
        return $this->hasOne(Tracking::class); // check if multiple people can track on one
    }

    public function createdFrom()
    {
        return $this->belongsTo(User::class, "created_user_id");
    }

    public function signedTo()
    {
        return $this->belongsTo(User::class, "signed_user_id");
    }

    public function readableStatus(int $key = 0): string
    {
        return $this->statuses[$key];
    }

    public static function openTasks()
    {
        return self::where("signed_user_id", "=", auth()->user()->id)
            ->where("status", "!=", 3) // completed
            ->where("status", "!=", 4) // rejected
            ->get();
    }
}
