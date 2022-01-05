<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCustomProjectSubmission
 */
class CustomProjectSubmission extends Model
{
    protected $fillable = [
        'name',
        'email',
        'budget',
        'deadline',
        'description',
    ];
}
