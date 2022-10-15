<?php

namespace Breuermarcel\ProjectManagement\Models;

use App\Models\User;
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

    public $status = [
        "planned",
        "in progress",
        "on hold",
        "completed",
        "rejected"
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function createdFrom()
    {
        return $this->belongsTo(User::class, "created_user_id");
    }

    public function signedTo()
    {
        return $this->belongsTo(User::class, "signed_user_id");
    }
}
