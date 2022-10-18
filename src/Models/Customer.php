<?php

namespace Breuermarcel\ProjectManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "bm_customers";

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        "salutation",
        "firstname",
        "lastname",
        "company_name",
        "tax_number",
        "street",
        "location",
        "country",
        "mobile_number",
        "email"
    ];

    public array $salutations = [
        "Mr.",
        "Ms.",
        "Mrs."
    ];

    public function readableSalutation(int $value = null): string
    {
        return $value !== null ? $this->salutations[$value] : "";
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * @param string $name
     * @return string
     */
    private function getTableName(string $name): string
    {
        return config("project-management.tables." . $name);
    }
}
