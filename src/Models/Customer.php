<?php

namespace Breuermarcel\ProjectManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
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

    public function getSalutationAttribute($value)
    {
        return match ($value) {
            1 => trans("Mr."),
            2 => trans("Mrs."),
            default => "",
        };
    }
}
