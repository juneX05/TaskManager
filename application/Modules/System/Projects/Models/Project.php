<?php

namespace Application\Modules\System\Projects\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Application\Modules\Configurations\DevConfigs\Tabs\ProjectStatuses\Models\ProjectStatus; 


class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        
		'name',
		'description',
		'project_status_id',

    ];


    public function project_status() {
      return $this->BelongsTo(ProjectStatus::class);
    }

}
