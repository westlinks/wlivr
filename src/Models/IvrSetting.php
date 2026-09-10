<?php

namespace Westlinks\SimpleIvr\Models;

use Illuminate\Database\Eloquent\Model;

class IvrSetting extends Model
{
    // Disable Laravel's mass assignment protection
    protected $fillable = ['digit', 'name', 'phone_number'];
}