<?php

namespace Breuermarcel\ProjectManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
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
}
