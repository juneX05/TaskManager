<?php

namespace Application\Modules\Configurations\DevConfigs\Tabs\ProjectStatuses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProjectStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        
		'id',
		'id',
		'name',
		'color',

    ];



}
