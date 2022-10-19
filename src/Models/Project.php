<?php

namespace Breuermarcel\ProjectManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "bm_projects";

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "description",
        "customer_id"
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function tracking()
    {
        return $this->hasOneThrough(Tracking::class, Task::class);
    }
}
